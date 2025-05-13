<?php
    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to get top-selling products for current year
    $sql = "
        SELECT 
            sm.model_name,
            SUM(oi.quantity) as total_sold,
            SUM(oi.quantity * oi.price_at_order) as total_revenue
        FROM order_items_tbl oi
        JOIN orders_tbl o ON oi.order_id = o.order_id
        JOIN colorway_tbl c ON oi.colorway_id = c.colorway_id
        JOIN shoe_model_tbl sm ON c.shoe_model_id = sm.shoe_model_id
        JOIN sales_tbl s ON o.order_id = s.order_id
        WHERE YEAR(s.date) = YEAR(CURRENT_DATE())
        AND o.status = 'Completed'
        GROUP BY sm.shoe_model_id, sm.model_name
        ORDER BY total_sold DESC
        LIMIT 5
    ";

    $result = $conn->query($sql);

    $products = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $products[] = [
                'model' => $row['model_name'],
                'sold' => (int)$row['total_sold'],
                'revenue' => number_format($row['total_revenue'], 2)
            ];
        }
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($products);
?> 