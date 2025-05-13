<?php

    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT DATE_FORMAT(date, '%M') AS month, SUM(amount) AS total FROM sales_tbl GROUP BY MONTH(date) ORDER BY MONTH(date)";

    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['month'];
        $data[] = (int)$row['total'];
    }

    echo json_encode([
        "labels" => $labels,
        "data" => $data
    ]);

?>
