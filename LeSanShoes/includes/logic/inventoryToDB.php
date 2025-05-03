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
                            $modified_by = $_SESSION['username'];
    
                            $stmt = $conn->prepare("INSERT INTO shoe_model_tbl 
                                                        (brand_id, category_id, material_id, traction_id, support_id, technology_id, model_name, description, date_created, date_updated, modified_by)
                                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                                                    ");
                            $stmt->bind_param("iiiiiisssss", $brand_id, $category_id, $material_id, $traction_id, $support_id, $technology_id, $model_name, $description, $date_updated, $date_updated, $modified_by);
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
                            $modified_by = $_SESSION['username'];
    
                            $stmt = $conn->prepare("UPDATE shoe_model_tbl SET brand_id=?, category_id=?, material_id=?, traction_id=?, support_id=?, technology_id=?, model_name=?, description=?, date_updated=?, modified_by=?
                                                    WHERE shoe_model_id=?   
                                                    ");
                            $stmt->bind_param("iiiiiissssi", $brand_id, $category_id, $material_id, $traction_id, $support_id, $technology_id, $model_name, $description,  $date_updated, $modified_by, $shoe_model_id);
                            if ($stmt->execute()) {
                                if ($stmt->affected_rows > 0) {
                                    echo json_encode(['status' => 'success', 'message' => 'Shoe model updated successfully.']);
                                } else {
                                    echo json_encode(['status' => 'error', 'message' => 'Failed to update shoe model.']);
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
                        case 'addColorwaySize':
                            $colorway_id = $obj->colorway_id;
                            $size_id = $obj->size_id;
                            $stock = $obj->stock;
                            $date_updated = date('Y-m-d H:i:s');
                            $modified_by = $_SESSION['username'];
    
                            $stmt = $conn->prepare("INSERT INTO colorway_size_tbl
                                                        (colorway_id, size_id, stock, date_created, date_updated, modified_by)
                                                        VALUES (?, ?, ?, ?, ?, ?)
                                                    ");
                            $stmt->bind_param("iiisss", $colorway_id, $size_id, $stock, $date_updated, $date_updated, $modified_by);
                            if ($stmt->execute()) {
                                if ($stmt->affected_rows > 0) {
                                    echo json_encode(['status' => 'success', 'message' => 'Newcolorway size added successfully.']);
                                } else {
                                    echo json_encode(['status' => 'error', 'message' => 'Failed to add new colorway size.']);
                                }
                                
                            } else {
                                echo "Failed to execute";
                            }
                            $stmt->close();
                        break;
                        case 'updateStock':
                            $colorway_size_id = $obj->colorway_size_id;
                            $change = $obj->change;
                            $date_updated = date('Y-m-d H:i:s');
                            $modified_by = $_SESSION['username'];
    
                            $stmt = $conn->prepare("UPDATE colorway_size_tbl SET stock = stock + ?, date_updated = ?, modified_by=? WHERE colorway_size_id = ?");
                            $stmt->bind_param("issi", $change, $date_updated, $modified_by, $colorway_size_id);
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
                        case 'deleteColorwaySize':
                            $colorway_size_id = $obj->colorway_size_id;
    
                            $deleteStmt = $conn->prepare("DELETE FROM colorway_size_tbl WHERE colorway_size_id = ?");
                            $deleteStmt->bind_param("i", $colorway_size_id);
                            if ($deleteStmt->execute()) {
                                echo json_encode(['status' => 'success', 'message' => 'Size for the specific colorway is deleted successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to delete size for the specific colorway.']);
                            }
                            $deleteStmt->close();
                        break;
                        case 'editColorwaySize':
                            $colorway_size_id = $obj->colorway_size_id;
                            $size_id = $obj->size_id;
                            $colorway_id = $obj->colorway_id;
                            $modified_by = $_SESSION['username'];
                            
                            $date_updated = date('Y-m-d H:i:s');
    
                            $stmt = $conn->prepare("UPDATE colorway_size_tbl SET colorway_id=?, size_id=?, date_updated=?, modified_by=?
                                                    WHERE colorway_size_id=?   
                                                    ");
                            $stmt->bind_param("iissi", $colorway_id, $size_id, $date_updated, $modified_by, $colorway_size_id);
                            if ($stmt->execute()) {
                                if ($stmt->affected_rows > 0) {
                                    echo json_encode(['status' => 'success', 'message' => ' Sizes updated successfully.']);
                                } else {
                                    echo json_encode(['status' => 'error', 'message' => 'Failed to update size.']);
                                }
                                
                            } else {
                                echo "Failed to execute";
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