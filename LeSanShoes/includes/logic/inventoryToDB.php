<?php
    // session_start();
    include("config.php");
    try{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            if($_SERVER["REQUEST_METHOD"]==="POST"){
                // CASE 1: If JSON input exists (for actions like 'addShoeModel')
                if (isset($_POST["myJson"])) {
                    $obj = json_decode($_POST["myJson"]);
                    $action = $obj->action ?? null;
                }
                // CASE 2: If multipart/form-data input exists (for file uploads)
                elseif (isset($_POST["action"])) {
                    $action = $_POST["action"];
                } else {
                    echo json_encode(["status" => "error", "message" => "No valid action found."]);
                    exit;
                }
                if (isset($action)) {
                    switch ($action){
                        case 'addShoeModel':
                            $brand_id = $obj->brand_id;
                            $category_id = $obj->category_id;
                            $material_id = $obj->material_id;
                            $traction_id = $obj->traction_id;
                            $support_id = $obj->support_id;
                            $technology_id = $obj->technology_id;
                            $model_name = $obj->model_name;
                            $description = $obj->description;
                            $date_updated = date('Y-m-d H:i:s');
    
                            $stmt = $conn->prepare("INSERT INTO shoe_model_tbl 
                                                        (brand_id, category_id, material_id, traction_id, support_id, technology_id, model_name, description, date_created, date_updated)
                                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                                                    ");
                            $stmt->bind_param("iiiiiissss", $brand_id, $category_id, $material_id, $traction_id, $support_id, $technology_id, $model_name, $description, $date_updated, $date_updated);
                            if ($stmt->execute()) {
                                if ($stmt->affected_rows > 0) {
                                    echo json_encode(['status' => 'success', 'message' => 'New shoe model added successfully.']);
                                } else {
                                    echo json_encode(['status' => 'error', 'message' => 'Failed to add new shoe model.']);
                                }
                                
                            } else {
                                echo "Failed to execute";
                            }
                            $stmt->close();
                        break;
                        case 'editShoeModel':
                            $shoe_model_id = $obj->shoe_model_id;
                            $brand_id = $obj->brand_id;
                            $category_id = $obj->category_id;
                            $material_id = $obj->material_id;
                            $traction_id = $obj->traction_id;
                            $support_id = $obj->support_id;
                            $technology_id = $obj->technology_id;
                            $model_name = $obj->model_name;
                            $description = $obj->description;
                            $date_updated = date('Y-m-d H:i:s');
    
                            $stmt = $conn->prepare("UPDATE shoe_model_tbl SET brand_id=?, category_id=?, material_id=?, traction_id=?, support_id=?, technology_id=?, model_name=?, description=?, date_created=?, date_updated=?
                                                    WHERE shoe_model_id=?   
                                                    ");
                            $stmt->bind_param("iiiiiissssi", $brand_id, $category_id, $material_id, $traction_id, $support_id, $technology_id, $model_name, $description, $date_updated, $date_updated, $shoe_model_id);
                            if ($stmt->execute()) {
                                if ($stmt->affected_rows > 0) {
                                    echo json_encode(['status' => 'success', 'message' => 'New shoe model added successfully.']);
                                } else {
                                    echo json_encode(['status' => 'error', 'message' => 'Failed to add new shoe model.']);
                                }
                                
                            } else {
                                echo "Failed to execute";
                            }
                            $stmt->close();
                        break;
                        case 'deleteShoeModel':
                            $shoe_model_id = $obj->shoe_model_id;
    
                            $deleteStmt = $conn->prepare("DELETE FROM shoe_model_tbl WHERE shoe_model_id = ?");
                            $deleteStmt->bind_param("i", $shoe_model_id);
                            if ($deleteStmt->execute()) {
                                echo json_encode(['status' => 'success', 'message' => 'Brand deleted successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to delete the brand name.']);
                            }
                            $deleteStmt->close();
                        break;
                        case 'addColorway':
                            $shoe_model_id = $_POST['shoe_model_id'];
                            $colorway_name = $_POST['colorway_name'];
                            $price = $_POST['price'];
                            $description = $_POST['description'];
                            $date_updated = date('Y-m-d H:i:s');
                        
                            $upload_dir = "../../assets/images/";
                            $image_paths = [];
                        
                            // Handle up to 4 images
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
                        
                            $stmt = $conn->prepare("INSERT INTO shoe_model_tbl 
                                (shoe_model_id, colorway_name, price, description, image1, image2, image3, image4, date_created, date_updated)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $stmt->bind_param("isssssssss",
                                $shoe_model_id,
                                $colorway_name,
                                $price,
                                $description,
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
                    }
                }
            }
        }
    }
    catch(Exception $e){
        http_response_code(404);
    }

    
    
?>