<?php
    // session_start();
    include("config.php");
    try{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $obj = json_decode($_POST["myJson"]);
            $action = $obj ->action;
            if (isset($action)) {
                switch ($action){
                    case 'signUp':
                        $username = $obj ->username;
                        $roles = 1;
                        $user_fname = $obj ->user_fname;
                        $user_lname = $obj ->user_lname;
                        $user_email = $obj ->user_email;
                        $user_password = $obj ->user_password;
                        $user_birthday = $obj ->user_birthday;
                        $user_address = $obj ->user_address;
                        $user_contact = $obj ->user_contact;
                        $date_created = date('Y-m-d H:i:s');

                        $dateObj = new DateTime($user_birthday);
                        $formatted_birthday = $dateObj->format('Y-m-d');
                        // $sql = "INSERT INTO users_tbl(username, roles_id, email, user_password, date_created, date_updated)  VALUES ('$username', '$roles', '$user_email', '$user_password', '$date_created','$date_created)";
                        $stmt = $conn->prepare("INSERT INTO users_tbl(username, roles_id, fname, lname, email, user_password, birthday, user_address, contact, date_created, date_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sisssssssss", $username, $roles, $user_fname, $user_lname, $user_email, $user_password, $formatted_birthday, $user_address, $user_contact, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo "New record is saved.";
                        } else {
                            echo "Error";
                        }
                        $stmt->close();
                    break;
                    case 'newAdmin':
                        $username = $obj ->username;
                        $roles = 3;
                        $user_fname = $obj ->user_fname;
                        $user_lname = $obj ->user_lname;
                        $user_email = $obj ->user_email;
                        $user_password = $obj ->user_password;
                        $user_contact = $obj ->user_contact;
                        $date_created = date('Y-m-d H:i:s');

                        // $sql = "INSERT INTO users_tbl(username, roles_id, email, user_password, date_created, date_updated)  VALUES ('$username', '$roles', '$user_email', '$user_password', '$date_created','$date_created)";
                        $stmt = $conn->prepare("INSERT INTO users_tbl(username, roles_id, fname, lname, email, user_password, contact, date_created, date_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sisssssss", $username, $roles, $user_fname, $user_lname, $user_email, $user_password,  $user_contact, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo "New record is saved.";
                        } else {
                            echo "Error";
                        }
                        $stmt->close();
                    break;
                    case 'updateAdmin':
                        $username = $obj ->username;
                        $roles = 3;
                        $user_fname = $obj ->user_fname;
                        $user_lname = $obj ->user_lname;
                        $user_email = $obj ->user_email;
                        $user_password = $obj ->user_password;
                        $user_contact = $obj ->user_contact;
                        $date_updated = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("UPDATE users_tbl SET roles_id = ?, fname = ?, lname = ?, email = ?, user_password = ?, contact = ?, date_updated = ? where username = ?");
                        $stmt->bind_param("isssssss", $roles, $user_fname, $user_lname, $user_email, $user_password,  $user_contact, $date_updated, $username);
                        if ($stmt->execute()) {
                            if ($stmt->affected_rows > 0) {
                                echo "Record was successfully updated.";
                            } else {
                                echo "Username not found.";
                            }
                            
                        } else {
                            echo "Failed to execute";
                        }
                        $stmt->close();
                        
                    break;
                    case 'login':
                        $username = $obj->username;
                        $user_password = $obj->user_password;
                        
                        /*
                        $sql = "SELECT * FROM users_tbl WHERE username='$username' AND user_password='$user_password'";
                        $result = $conn->query($sql);
                        $user = $result->fetch_assoc(); // Get user row as associative array
                        $roles_id = $user['roles_id'];*/
                        $stmt = $conn->prepare("SELECT * FROM users_tbl WHERE (username=? OR email=?) AND user_password=?");
                        $stmt->bind_param("sss", $username, $username, $user_password);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $user = $result->fetch_assoc();
                            $_SESSION['username'] = $user['username'];
                            $_SESSION['email'] = $user['email'];
                            $_SESSION['roles_id'] = $user['roles_id'];

                            $updateStmt = $conn->prepare("UPDATE users_tbl SET last_login = NOW() WHERE username = ?");
                            $updateStmt->bind_param("s", $user['username']);
                            $updateStmt->execute();
                            $updateStmt->close();
                
                            echo json_encode([
                                'status' => 'success',
                                'roles_id' => $user['roles_id']
                            ]);
                        } else {
                            echo json_encode([
                                'status' => 'error',
                                'message' => 'Invalid credentials'
                            ]);
                        }
                        $stmt->close();
                    break;
                    case 'deleteAdmin':
                        $username = $obj->username;
                    
                        $stmt = $conn->prepare("SELECT username FROM users_tbl WHERE username = ?");
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                        if ($result->num_rows > 0) {
                            echo json_encode(['status' => 'success']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Username not found.']);
                        }
                        $stmt->close();
                    break;
                    case 'confirmDelete':
                        $username = $obj->username;
                        $password = $obj->password;
                        $adminUsername = $_SESSION['username'];
                    
                        $stmt = $conn->prepare("SELECT user_password FROM users_tbl WHERE username=? AND user_password=?");
                        $stmt->bind_param("ss", $adminUsername, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows > 0) {
                            if ($adminUsername === $username) {
                                echo json_encode(['status' => 'error', 'message' => 'You cannot delete your own account.']);
                                break;
                            }
                            $deleteStmt = $conn->prepare("DELETE FROM users_tbl WHERE username = ?");
                            $deleteStmt->bind_param("s", $username);
                            if ($deleteStmt->execute()) {
                                echo json_encode(['status' => 'success', 'message' => 'User deleted successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Deletion failed.']);
                            }
                            $deleteStmt->close();
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Incorrect admin password.']);
                        }
                        $stmt->close();
                    break;
                    case 'newSuperAdmin':
                        $username = $obj->username;
                        $roles_id = 3;
                        $stmt = $conn->prepare("SELECT username FROM users_tbl WHERE username = ? and roles_id=?");
                        $stmt->bind_param("si", $username, $roles_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                        if ($result->num_rows > 0) {
                            echo json_encode(['status' => 'success']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Username not found.']);
                        }
                        $stmt->close();
                    break;
                    case 'confirmAddSuperAdmin':
                        $username = $obj->username;
                        $password = $obj->password;
                        $adminUsername = $_SESSION['username'];
                        $roles_id = 2;
                    
                        $stmt = $conn->prepare("SELECT user_password FROM users_tbl WHERE username=? AND user_password=?");
                        $stmt->bind_param("ss", $adminUsername, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows > 0) {
                            if ($adminUsername === $username) {
                                echo json_encode(['status' => 'error', 'message' => 'You are already a super admin.']);
                                break;
                            }
                            $updateStmt = $conn->prepare("UPDATE users_tbl SET roles_id = ? where username = ?");
                            $updateStmt->bind_param("is", $roles_id, $username);
                            if ($updateStmt->execute()) {
                                echo json_encode(['status' => 'success', 'message' => 'Super Admin added successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
                            }
                            $updateStmt->close();
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Incorrect admin password.']);
                        }
                        $stmt->close();
                    break;
                    case 'deleteSuperAdmin':
                        $username = $obj->username;
                        $roles_id = 2;
                        $stmt = $conn->prepare("SELECT username FROM users_tbl WHERE username = ? and roles_id=?");
                        $stmt->bind_param("si", $username, $roles_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                        if ($result->num_rows > 0) {
                            echo json_encode(['status' => 'success']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Username not found.']);
                        }
                        $stmt->close();
                    break;
                    case 'confirmDeleteSuperAdmin':
                        $username = $obj->username;
                        $password = $obj->password;
                        $adminUsername = $_SESSION['username'];
                        $roles_id = 3;
                    
                        $stmt = $conn->prepare("SELECT user_password FROM users_tbl WHERE username=? AND user_password=?");
                        $stmt->bind_param("ss", $adminUsername, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result->num_rows > 0) {
                            if ($adminUsername === $username) {
                                echo json_encode(['status' => 'error', 'message' => 'You cannot remove yourself super admin.']);
                                break;
                            }
                            $updateStmt = $conn->prepare("UPDATE users_tbl SET roles_id = ? where username = ?");
                            $updateStmt->bind_param("is", $roles_id, $username);
                            if ($updateStmt->execute()) {
                                echo json_encode(['status' => 'success', 'message' => 'Super Admin added successfully.']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
                            }
                            $updateStmt->close();
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Incorrect admin password.']);
                        }
                        $stmt->close();
                    break;
                    
                }
            }
        }
    }
    catch(Exception $e){
        http_response_code(404);
    }
?>