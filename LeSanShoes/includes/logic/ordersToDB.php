<?php
    // session_start();
    include("config.php");
    try{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            if($_SERVER["REQUEST_METHOD"]==="POST"){
                if (isset($_POST["myJson"])) {
                    $obj = json_decode($_POST["myJson"]);
                    $action = $obj->action ?? null;
                }
                elseif (isset($_POST["action"])) {
                    $action = $_POST["action"];
                } else {
                    echo json_encode(["status" => "error", "message" => "No valid action found."]);
                    exit;
                }
                if (isset($action)) {
                    switch ($action){
                        case 'updateStatus':
                            $orderId = $obj->orderId;
                            $newStatus = $obj->newStatus;
                            $date_updated = date('Y-m-d H:i:s');
                            $modified_by = $_SESSION['username'];
    
                            $stmt = $conn->prepare("UPDATE orders_tbl SET status = ? WHERE order_id = ?");
                            $stmt->bind_param("si", $newStatus, $orderId);
                            $stmt->execute();

                            if ($newStatus === '3') {
                                // Check if already exists
                                $check = $conn->prepare("SELECT * FROM sales_tbl WHERE order_id = ?");
                                $check->bind_param("i", $orderId);
                                $check->execute();
                                $res = $check->get_result();

                                if ($res->num_rows === 0) {
                                    // Get total amount
                                    $result = $conn->query("SELECT total_price FROM orders_tbl WHERE order_id = $orderId");
                                    $row = $result->fetch_assoc();
                                    $amount = $row['total_price'];

                                    $insert = $conn->prepare("INSERT INTO sales_tbl (order_id, amount) VALUES (?, ?)");
                                    $insert->bind_param("id", $orderId, $amount);
                                    $insert->execute();
                                }
                            }
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