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
            $shoe_model_id = trim($_POST['shoe_model_id']);
            $colorway_name = trim($_POST['colorway_name']);
            $price = $_POST['price'];
            $date_updated = date('Y-m-d H:i:s');
            $modified_by = $_SESSION['username'];

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
                (shoe_model_id, colorway_name, price, image1, image2, image3, image4, date_created, date_updated, modified_by)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?)");
            $stmt->bind_param("isssssssss",
                $shoe_model_id,
                $colorway_name,
                $price,
                $image_paths['image1'],
                $image_paths['image2'],
                $image_paths['image3'],
                $image_paths['image4'],
                $date_updated,
                $date_updated, 
                $modified_by
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
        
            $selectStmt = $conn->prepare("SELECT image1, image2, image3, image4 FROM colorway_tbl WHERE colorway_id = ?");
            $selectStmt->bind_param("i", $colorway_id);
            $selectStmt->execute();
            $result = $selectStmt->get_result();

            if ($result->num_rows === 0) {
                echo json_encode(['status' => 'error', 'message' => 'Colorway not found.']);
                exit;
            }

            $row = $result->fetch_assoc();
            $images = [$row['image1'], $row['image2'], $row['image3'], $row['image4']];
            $selectStmt->close();
        
            $deleteStmt = $conn->prepare("DELETE FROM colorway_tbl WHERE colorway_id = ?");
            $deleteStmt->bind_param("i", $colorway_id);
        
            if ($deleteStmt->execute()) {
                foreach ($images as $imgPath) {
                    $serverPath = '../' . $imgPath; // Convert to actual server path (e.g., ../../assets/images/...)
                    if (file_exists($serverPath)) {
                        unlink($serverPath); // Deletes the file
                    }
                }
                echo json_encode(['status' => 'success', 'message' => 'Colorway deleted successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete colorway.']);
            }
        
            $deleteStmt->close();
            break;
        case 'updateColorway':
            $colorway_id = $_POST['colorway_id'];
            $shoe_model_id = trim($_POST['shoe_model_id']);
            $colorway_name = trim($_POST['edit_colorway_name']);
            $price = $_POST['edit_price'];
            $date_updated = date('Y-m-d H:i:s');
            $modified_by = $_SESSION['username'];

            // Fetch existing image paths
            $query = $conn->prepare("SELECT image1, image2, image3, image4 FROM colorway_tbl WHERE colorway_id = ?");
            $query->bind_param("i", $colorway_id);
            $query->execute();
            $query->bind_result($img1, $img2, $img3, $img4);
            $query->fetch();
            $query->close();
        
            $upload_dir = "../../assets/images/";
            $dbUpload_dir = "../assets/images/";
            $image_paths = [
                'image1' => $img1,
                'image2' => $img2,
                'image3' => $img3,
                'image4' => $img4
            ];
        
            for ($i = 1; $i <= 4; $i++) {
                $fieldName = "image$i";
                if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === 0) {
                    $tmp_name = $_FILES[$fieldName]['tmp_name'];
                    $original_name = basename($_FILES[$fieldName]['name']);
                    $extension = pathinfo($original_name, PATHINFO_EXTENSION);
                    $new_filename = "colorway_" . uniqid() . ".$extension";
                    $target_path = $upload_dir . $new_filename;
                    $dbTarget_path = $dbUpload_dir . $new_filename;
        
                    if (move_uploaded_file($tmp_name, $target_path)) {
                        // Delete old image safely
                        $old_path = str_replace('../', '', $image_paths[$fieldName]); 
                        $absolute_old_path = realpath(__DIR__ . '/../../' . $old_path);
        
                        if ($absolute_old_path && is_file($absolute_old_path)) {
                            unlink($absolute_old_path);
                        }
        
                        // Update image path
                        $image_paths[$fieldName] = $dbTarget_path;
                    }
                }
            }
        
            $stmt = $conn->prepare("UPDATE colorway_tbl 
                SET shoe_model_id = ?, colorway_name = ?, price = ?, 
                    image1 = ?, image2 = ?, image3 = ?, image4 = ?, date_updated = ?, modified_by=?
                WHERE colorway_id = ?");
        
            $stmt->bind_param("issssssssi",
                $shoe_model_id,
                $colorway_name,
                $price,
                $image_paths['image1'],
                $image_paths['image2'],
                $image_paths['image3'],
                $image_paths['image4'],
                $date_updated,
                $modified_by,
                $colorway_id
            );

            if ($stmt->execute()) {
                if ($stmt->affected_rows === 0) {
                    // It might be that the values are identical to the previous ones.
                    echo json_encode(['status' => 'warning', 'message' => 'No changes were made.']);
                } else {
                    echo json_encode(['status' => 'success', 'message' => 'Colorway updated successfully.']);
                }
            
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update colorway.']);
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