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
                        $user_email = $obj ->user_email;
                        $user_password = $obj ->user_password;
                        $sql = "INSERT INTO users_tbl(username, roles_id, email, user_password)  VALUES ('$username', '$roles', '$user_email', '$user_password')";
                        if ($conn->query($sql)===TRUE){
                            echo "New record is saved.";
                        }
                        else{
                            echo "Error";
                        }
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