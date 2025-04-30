<?php
    // session_start();
    include("config.php");
    try{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            if($_SERVER["REQUEST_METHOD"]==="POST"){
                $obj = json_decode($_POST["myJson"]);
                $action = $obj ->action;
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
                    }
                }
            }
        }
    }
    catch(Exception $e){
        http_response_code(404);
    }

    
    
?>