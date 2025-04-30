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
            $description = $_POST['description'];
            $date_updated = date('Y-m-d H:i:s');

            $upload_dir = "../../assets/images/";
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

                    if (move_uploaded_file($tmp_name, $target_path)) {
                        $image_paths["image$i"] = $target_path;
                    } else {
                        echo json_encode(['status' => 'error', 'message' => "Failed to upload image $i"]);
                        exit;
                    }
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
                echo json_encode(['status' => 'success', 'message' => 'New colorway added successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add new colorway.']);
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