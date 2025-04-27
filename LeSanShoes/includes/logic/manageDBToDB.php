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