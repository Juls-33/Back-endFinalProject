<?php
    // session_start();
    include("config.php");
    try{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $obj = json_decode($_POST["myJson"]);
            $action = $obj ->action;
            if (isset($action)) {
                switch ($action){
                    case 'brandEdit':
                        $brandID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("UPDATE brand_tbl SET brand_name = ?, date_updated = ? where brand_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $brandID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Brand name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update brand name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;
                    case 'brandAdd':
                        $brandID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("INSERT INTO brand_tbl(brand_id, brand_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $brandID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Brand name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the brand name.']);
                        }
                        $stmt->close();
                    break;
                    case 'brandDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $deleteStmt = $conn->prepare("DELETE FROM brand_tbl WHERE brand_id = ?");
                        $deleteStmt->bind_param("s", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Brand deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the brand name.']);
                        }
                        $deleteStmt->close();
                    break;    
                    case 'categoryEdit':
                        $categoryID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("UPDATE category_tbl SET category_name = ?, date_updated = ? where category_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $categoryID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Shoe category name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update shoe category name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'categoryAdd':
                        $categoryID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("INSERT INTO category_tbl(category_id, category_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $categoryID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the shoe category name.']);
                        }
                        $stmt->close();
                    break;    
                    case 'categoryDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $deleteStmt = $conn->prepare("DELETE FROM category_tbl WHERE category_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe category name.']);
                        }
                        $deleteStmt->close();
                    break;   
                    case 'shoesGenderEdit':
                        $shoesGenderID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("UPDATE shoes_gender_tbl SET shoes_gender_name = ?, date_updated = ? where shoes_gender_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $shoesGenderID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Shoe gender name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update shoe gender name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'shoesGenderAdd':
                        $shoesGenderID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("INSERT INTO shoes_gender_tbl(shoes_gender_id, shoes_gender_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $shoesGenderID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Order status name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the Order status name.']);
                        }
                        $stmt->close();
                    break;    
                    case 'shoesGenderDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $deleteStmt = $conn->prepare("DELETE FROM shoes_gender_tbl WHERE shoes_gender_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe gender deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe gender name.']);
                        }
                        $deleteStmt->close();
                    break;    
                    case 'statusEdit':
                        $statusID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("UPDATE status_tbl SET status_name = ?, date_updated = ? where status_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $statusID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Order status name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update Order status name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'statusAdd':
                        $statusID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("INSERT INTO status_tbl(status_id, status_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $statusID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Order status name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the Order statusname.']);
                        }
                        $stmt->close();
                    break;    
                    case 'statusDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $deleteStmt = $conn->prepare("DELETE FROM status_tbl WHERE status_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe category name.']);
                        }
                        $deleteStmt->close();
                    break;  
                    case 'materialEdit':
                        $materialID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("UPDATE material_tbl SET material_name = ?, date_updated = ? where material_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $materialID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Shoe material name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update Shoe material name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'materialAdd':
                        $materialID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("INSERT INTO material_tbl(material_id, material_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $materialID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe material name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the Shoe materialname.']);
                        }
                        $stmt->close();
                    break;    
                    case 'materialDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $deleteStmt = $conn->prepare("DELETE FROM material_tbl WHERE material_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe category name.']);
                        }
                        $deleteStmt->close();
                    break;  
                    case 'tractionEdit':
                        $tractionID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("UPDATE traction_tbl SET traction_name = ?, date_updated = ? where traction_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $tractionID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Shoe traction name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update Shoe traction name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'tractionAdd':
                        $tractionID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("INSERT INTO traction_tbl(traction_id, traction_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $tractionID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe traction name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the Shoe tractionname.']);
                        }
                        $stmt->close();
                    break;    
                    case 'tractionDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $deleteStmt = $conn->prepare("DELETE FROM traction_tbl WHERE traction_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe category name.']);
                        }
                        $deleteStmt->close();
                    break;  
                    case 'supportEdit':
                        $supportID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("UPDATE support_tbl SET support_name = ?, date_updated = ? where support_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $supportID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Shoe support name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update Shoe support name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'supportAdd':
                        $supportID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("INSERT INTO support_tbl(support_id, support_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $supportID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe support name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the Shoe supportname.']);
                        }
                        $stmt->close();
                    break;    
                    case 'supportDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $deleteStmt = $conn->prepare("DELETE FROM support_tbl WHERE support_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe category name.']);
                        }
                        $deleteStmt->close();
                    break;  
                    case 'technologyEdit':
                        $technologyID= $obj ->tblID;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("UPDATE technology_tbl SET technology_name = ?, date_updated = ? where technology_id = ?");
                        $stmt->bind_param("ssi", $formField, $date_updated, $technologyID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'Shoe technology name is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update Shoe technology name.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'technologyAdd':
                        $technologyID= $obj ->tblID;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $stmt = $conn->prepare("INSERT INTO technology_tbl(technology_id, technology_name, date_created, date_updated) VALUES (?,?,?,?)");
                        $stmt->bind_param("isss", $technologyID, $formField, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe technology name saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the Shoe technologyname.']);
                        }
                        $stmt->close();
                    break;    
                    case 'technologyDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');
                    
                        $deleteStmt = $conn->prepare("DELETE FROM technology_tbl WHERE technology_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'Shoe category deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the shoe category name.']);
                        }
                        $deleteStmt->close();
                    break;  
                    case 'userRolesEdit':
                        $rolesID= $obj ->tblID;
                        $userRolesDesc= $obj ->userRolesDesc;
                        $formField= $obj ->formField;
                        $date_updated = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("UPDATE roles_tbl SET roles_name = ?, roles_desc = ?, date_updated = ? where roles_id = ?");
                        $stmt->bind_param("sssi", $formField, $userRolesDesc, $date_updated, $rolesID);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo json_encode(['status' => 'success', 'message' => 'User Roles is updated successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update user roles.']);
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                    break;   
                    case 'userRolesAdd':
                        $rolesID= $obj ->tblID;
                        $userRolesDesc= $obj ->userRolesDesc;
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("INSERT INTO roles_tbl(roles_id, roles_name, roles_desc, date_created, date_updated) VALUES (?,?,?,?,?)");
                        $stmt->bind_param("issss", $rolesID, $formField, $userRolesDesc, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'User roles saved successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to save the user roles.']);
                        }
                        $stmt->close();
                    break;    
                    case 'userRolesDelete':
                        $formField = $obj ->formField;
                        $date_created = date('Y-m-d H:i:s');

                        $deleteStmt = $conn->prepare("DELETE FROM roles_tbl WHERE roles_id = ?");
                        $deleteStmt->bind_param("i", $formField);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['status' => 'success', 'message' => 'User roles deleted successfully.']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the user roles.']);
                        }
                        $deleteStmt->close();
                    break;     
                }
            }
        }
    }
    catch(Exception $e){
        http_response_code(404);
    }
?>