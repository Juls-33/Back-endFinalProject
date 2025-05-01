<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;

    if (!$action) {
        echo json_encode(["status" => "error", "message" => "No action provided."]);
        exit;
    }

    switch ($action) {
        case 'addColorway':
            $shoe_model_id = $_POST['shoe_model_id'];
            $colorway_name = $_POST['colorway_name'];
            $price = $_POST['price'];
            // $description = $_POST['description'];
            $date_updated = date('Y-m-d H:i:s');

            $upload_dir = "../../assets/images/";
            $dbUpload_dir = "../assets/images/";
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $image_paths = [];

            for ($i = 1; $i <= 4; $i++) {
                if (isset($_FILES["image$i"]) && $_FILES["image$i"]["error"] === 0) {
                    $tmp_name = $_FILES["image$i"]["tmp_name"];
                    $original_name = basename($_FILES["image$i"]["name"]);
                    $extension = pathinfo($original_name, PATHINFO_EXTENSION);
                    $new_filename = "colorway_" . uniqid() . ".$extension";
                    $target_path = $upload_dir . $new_filename;
                    $dbTarget_path = $dbUpload_dir . $new_filename;

                    $temp_files["image$i"] = [
                        "tmp" => $tmp_name,
                        "path" => $target_path
                    ];
                    $image_paths["image$i"] = $dbTarget_path;
                } else {
                    echo json_encode(['status' => 'error', 'message' => "Image $i is missing or invalid"]);
                    exit;
                }
            }

            $stmt = $conn->prepare("INSERT INTO colorway_tbl 
                (shoe_model_id, colorway_name, price, image1, image2, image3, image4, date_created, date_updated)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssssss",
                $shoe_model_id,
                $colorway_name,
                $price,
                $image_paths['image1'],
                $image_paths['image2'],
                $image_paths['image3'],
                $image_paths['image4'],
                $date_updated,
                $date_updated
            );

            if ($stmt->execute()) {
                foreach ($temp_files as $img) {
                    move_uploaded_file($img["tmp"], $img["path"]);
                }
                echo json_encode(['status' => 'success', 'message' => 'New colorway added successfully.']);
            } else {
                if ($conn->errno == 1062) {
                    echo json_encode([
                        'status' => 'error', 
                        'message' => 'This colorway name already exists for the selected shoe model.'
                    ]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to add new colorway.']);
                }
            }

            $stmt->close();
            break;
            case 'deleteColorway':
                $colorway_id = $_POST['colorway_id'] ?? null;
            
                if (!$colorway_id) {
                    echo json_encode(['status' => 'error', 'message' => 'No colorway ID provided.']);
                    exit;
                }
            
                // Optionally delete images here if stored in filesystem
            
                $stmt = $conn->prepare("DELETE FROM colorway_tbl WHERE colorway_id = ?");
                $stmt->bind_param("i", $colorway_id);
            
                if ($stmt->execute()) {
                    echo json_encode(['status' => 'success', 'message' => 'Colorway deleted successfully.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete colorway.']);
                }
            
                $stmt->close();
                break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}

?>