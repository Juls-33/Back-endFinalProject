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

                       
                    //     $user = getSingleRecord($sql, 'ss', [$username, $username]);
                    //     if (!empty($user)) { // if user was found
                    //         if (password_verify($password, $user_password)) { // if password matches
                    //                 // log user in
                    //                 loginById($user['id']);
                    //         } else { // if password does not match
                    //                 $_SESSION['error_msg'] = "Wrong credentials";
                    //         }
                    // } else { // if no user found
                    //         $_SESSION['error_msg'] = "Wrong credentials";
                    // }
                    break;
                }
            }
        }
    }
    catch(Exception $e){
        http_response_code(404);
    }
?>