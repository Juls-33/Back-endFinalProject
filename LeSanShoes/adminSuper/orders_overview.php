<?php

    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT status, COUNT(*) as count FROM orders_tbl GROUP BY status";
    $result = $conn->query($sql);

    $statuses = [
        'Pending' => 0,
        'Cancelled' => 0,
        'Processing' => 0,
        'Completed' => 0
    ];

    while ($row = $result->fetch_assoc()) {
        $status = $row['status'];
        if (array_key_exists($status, $statuses)) {
            $statuses[$status] = (int)$row['count'];
        }
    }

    echo json_encode($statuses);

?>