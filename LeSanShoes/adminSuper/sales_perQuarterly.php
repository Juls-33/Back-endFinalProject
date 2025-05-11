<?php

    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT CONCAT(QUARTER(date), ' ', 'Quarter') AS quarter, SUM(amount) AS total FROM sales_tbl GROUP BY QUARTER(date) ORDER BY QUARTER(date)";

    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['quarter'];
        $data[] = (int)$row['total'];
    }

    echo json_encode([
        "labels" => $labels,
        "data" => $data
    ]);

?>