
<?php
include("config.php");

try{
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // users query
        $sql = "SELECT 
            o.order_id,
            CONCAT(u.fname,' ',u.lname) as username,
            o.total_price,
            o.order_date,
            o.customer_address,
            o.status,
            oi.quantity,
            cw.colorway_name,
            s.size_name,
            sm.model_name,
            cw.image1
        FROM orders_tbl o
        JOIN order_items_tbl oi ON o.order_id = oi.order_id
        LEFT JOIN colorway_size_tbl cs ON oi.colorway_size_id = cs.colorway_size_id
        LEFT JOIN colorway_tbl cw ON cs.colorway_id = cw.colorway_id
        LEFT JOIN shoe_model_tbl sm ON cw.shoe_model_id = sm.shoe_model_id
        LEFT JOIN size_tbl s ON cs.size_id = s.size_id
        LEFT JOIN users_tbl u ON o.username = u.username

        WHERE o.status = 1 or o.status=2
        ";

        $result = $conn->query($sql);
        $orders = [];       
        
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        $groupedOrders = [];

        while ($row = $result->fetch_assoc()) {
            $orderId = $row['order_id'];

            if (!isset($groupedOrders[$orderId])) {
                $groupedOrders[$orderId] = [
                    'order_id' => $row['order_id'],
                    'username' => $row['username'],
                    'total_price' => $row['total_price'],
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'customer_address' => $row['customer_address'],
                    'items' => []
                ];
            }

            $groupedOrders[$orderId]['items'][] = [
                'shoe_model_id' => $row['shoe_model_id'],
                'model_name' => $row['model_name'],
                'colorway_name' => $row['colorway_name'],
                'size_name' => $row['size_name'],
                'quantity' => $row['quantity'],
                'image1' => $row['image1']
            ];
        }
        
        // COMPLETED
        $sql = "SELECT 
            o.order_id,
            CONCAT(u.fname,' ',u.lname) as username,
            o.total_price,
            o.order_date,
            o.customer_address,
            o.status,
            oi.quantity,
            cw.colorway_name,
            s.size_name,
            sm.model_name,
            cw.image1
        FROM orders_tbl o
        JOIN order_items_tbl oi ON o.order_id = oi.order_id
        LEFT JOIN colorway_size_tbl cs ON oi.colorway_size_id = cs.colorway_size_id
        LEFT JOIN colorway_tbl cw ON cs.colorway_id = cw.colorway_id
        LEFT JOIN shoe_model_tbl sm ON cw.shoe_model_id = sm.shoe_model_id
        LEFT JOIN size_tbl s ON cs.size_id = s.size_id
        LEFT JOIN users_tbl u ON o.username = u.username
        WHERE o.status = 3
        ";

        $result = $conn->query($sql);
        $completed = [];       
        
        while ($row = $result->fetch_assoc()) {
            $completed[] = $row;
        }

        $completedOrders = [];

        while ($row = $result->fetch_assoc()) {
            $orderId = $row['order_id'];

            if (!isset($completedOrders[$orderId])) {
                $completedOrders[$orderId] = [
                    'order_id' => $row['order_id'],
                    'username' => $row['username'],
                    'total_price' => $row['total_price'],
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'customer_address' => $row['customer_address'],
                    'items' => []
                ];
            }

            $completedOrders[$orderId]['items'][] = [
                'shoe_model_id' => $row['shoe_model_id'],
                'model_name' => $row['model_name'],
                'colorway_name' => $row['colorway_name'],
                'size_name' => $row['size_name'],
                'quantity' => $row['quantity'],
                'image1' => $row['image1']
            ];
        }

        // CANCELLED
        $sql = "SELECT 
            o.order_id,
            CONCAT(u.fname,' ',u.lname) as username,
            o.total_price,
            o.order_date,
            o.customer_address,
            o.status,
            oi.quantity,
            cw.colorway_name,
            s.size_name,
            sm.model_name,
            cw.image1
        FROM orders_tbl o
        JOIN order_items_tbl oi ON o.order_id = oi.order_id
        LEFT JOIN colorway_size_tbl cs ON oi.colorway_size_id = cs.colorway_size_id
        LEFT JOIN colorway_tbl cw ON cs.colorway_id = cw.colorway_id
        LEFT JOIN shoe_model_tbl sm ON cw.shoe_model_id = sm.shoe_model_id
        LEFT JOIN size_tbl s ON cs.size_id = s.size_id
        LEFT JOIN users_tbl u ON o.username = u.username
        WHERE o.status = 4
        ";

        $result = $conn->query($sql);
        $cancelled = [];       
        
        while ($row = $result->fetch_assoc()) {
            $cancelled[] = $row;
        }

        $cancelledOrders = [];

        while ($row = $result->fetch_assoc()) {
            $orderId = $row['order_id'];

            if (!isset($cancelledOrders[$orderId])) {
                $cancelledOrders[$orderId] = [
                    'order_id' => $row['order_id'],
                    'username' => $row['username'],
                    'total_price' => $row['total_price'],
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'customer_address' => $row['customer_address'],
                    'items' => []
                ];
            }

            $cancelledOrders[$orderId]['items'][] = [
                'shoe_model_id' => $row['shoe_model_id'],
                'model_name' => $row['model_name'],
                'colorway_name' => $row['colorway_name'],
                'size_name' => $row['size_name'],
                'quantity' => $row['quantity'],
                'image1' => $row['image1']
            ];
        }

        echo json_encode([
            "orders" => $orders,
            "completed" => $completed,
            "cancelled" => $cancelled,
            
        ]);
    }
}
catch(Exception $e){
    http_response_code(500); // 500 is more appropriate for server errors
    echo json_encode([
        "error" => $e->getMessage()
    ]);
}

?>