
<?php
include("config.php");

try{
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // users query
        $sql = "SELECT 
            o.order_id,
            o.username,
            o.total_price,
            o.order_date,
            o.status,
            oi.quantity,
            cw.colorway_name,
            s.size_name,
            sm.model_name,
            cw.image1
        FROM orders_tbl o
        JOIN order_items_tbl oi ON o.order_id = oi.order_id
        JOIN colorway_size_tbl cs ON oi.colorway_size_id = cs.colorway_size_id
        JOIN colorway_tbl cw ON cs.colorway_id = cw.colorway_id
        JOIN shoe_model_tbl sm ON cw.model_id = sm.shoe_model_id
        JOIN size_tbl s ON cs.size_id = s.size_id
        ";

        $result = $conn->query($sql);
        $orders = [];

        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        echo json_encode([
            "orders" => $orders,
        ]);
    }
}
catch(Exception $e){
    http_response_code(408);
}

?>