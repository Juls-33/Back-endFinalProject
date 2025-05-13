<?php

    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql =  "SELECT YEAR(date) AS year, SUM(amount) AS total FROM sales_tbl GROUP BY YEAR(date) ORDER BY YEAR(date)";
    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['year'];
        $data[] = (int)$row['total'];
    }

    echo json_encode([
        "labels" => $labels,
        "data" => $data
    ]);

?>
