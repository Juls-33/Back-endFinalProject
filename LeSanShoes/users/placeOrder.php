<?php
include("../includes/logic/config.php");
header('Content-Type: application/json');


if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo json_encode("Not logged in.");
    exit;
}

$username = $_SESSION['username'];
$conn->begin_transaction();

try {
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        if (isset($_POST["myJson"])) {
            $obj = json_decode($_POST["myJson"], true);
            $action = $obj['action'] ?? null;
            $items = $obj['items'] ?? [];
            $address = trim($obj['address'] ?? '');
            $contact = trim($obj['phone'] ?? '');
            $date_updated = date('Y-m-d H:i:s');
            
            if (empty($items) || empty($address)) {
            http_response_code(400);
            echo json_encode("Missing items or address.");
            exit;
        }
        }
        elseif (isset($_POST["action"])) {
            $action = $_POST["action"];
        } else {
            echo json_encode(["status" => "error", "message" => "No valid action found."]);
            exit;
        }
        if (isset($action)) {
            switch ($action){
                case 'checkout':
                    $total_price = 0;
                    foreach ($items as $item) {
                        $total_price += (float)$item['total_price'];
                    }
                    $stmt = $conn->prepare("INSERT INTO orders_tbl (username, order_date, status, customer_address, contact, total_price, date_created, date_updated) VALUES (?, NOW(), 'Pending', ?, ?, ?, NOW(), NOW())");
                    $stmt->bind_param("sssd", $username, $address, $contact, $total_price);
                    $stmt->execute();
                    $order_id = $stmt->insert_id;
                    $stmt->close();
                    
                    // 2. Prepare statements
                    $itemStmt = $conn->prepare("
                        INSERT INTO order_items_tbl 
                        (order_id, colorway_id, size_id, quantity, colorway_size_id, price_at_order, date_created, date_updated)
                        VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())
                    ");
                    $updateStockStmt = $conn->prepare("
                        UPDATE colorway_size_tbl SET stock = stock - ? WHERE colorway_size_id = ?
                    ");
                    $deleteCartStmt = $conn->prepare("
                        DELETE FROM cart_tbl WHERE cart_id = ?
                    ");

                    // 3. Process each item
                    foreach ($items as $item) {
                         $cart_id = $item['cart_id'];
                        $colorway_id = $item['colorway_id'];
                        $colorway_size_id = $item['colorway_size_id'];
                        $quantity = $item['quantity'];
                        $price_at_order = $item['price_at_order'];
                        
                        $getSizeStmt = $conn->prepare("SELECT size_id FROM colorway_size_tbl WHERE colorway_size_id = ?");
                        $getSizeStmt->bind_param("i", $colorway_size_id);
                        $getSizeStmt->execute();
                        $getSizeStmt->bind_result($size_id);
                        $getSizeStmt->fetch();
                        $getSizeStmt->close();


                         // Insert order item
                        $itemStmt->bind_param("iiiiid", $order_id, $colorway_id, $size_id, $quantity, $colorway_size_id, $price_at_order);
                        $itemStmt->execute();

                        // Update stockprice_at_order
                        $updateStockStmt->bind_param("ii", $quantity, $colorway_size_id);
                        $updateStockStmt->execute();

                        // Remove from cart
                        $deleteCartStmt->bind_param("i", $cart_id);
                        $deleteCartStmt->execute();
                    }

                    $itemStmt->close();
                    $updateStockStmt->close();
                    $deleteCartStmt->close();

                    $conn->commit();
                    echo json_encode("Order successfully placed.");
                break;
            }
        }
    }    
} catch (Exception $e) {
    $conn->rollback();
    http_response_code(500);
    echo json_encode("Error: " . $e->getMessage());
}
