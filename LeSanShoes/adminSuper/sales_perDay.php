<?php 
    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $query = "SELECT DATE(date) as sale_date, SUM(amount) as total FROM sales_tbl GROUP BY sale_date ORDER BY sale_date ASC";
    $result = $conn->query($query);

    $data = [];
    $labels = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = date('l', strtotime($row['sale_date']));  
        $data[] = (int)$row['total'];
    }

    //$conn->close();

    echo json_encode(['labels' => $labels, 'data' => $data]);
    
?>