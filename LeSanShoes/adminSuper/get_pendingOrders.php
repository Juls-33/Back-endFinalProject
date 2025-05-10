<?php

    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) AS pending_count FROM orders_tbl WHERE status = 'pending'";
    $result = $conn->query($sql);

    $pendingCount = 0;
    if ($result) {
        $row = $result->fetch_assoc();
        if ($row) {
            $pendingCount = (int)$row['pending_count'];
        }
    }

    echo $pendingCount;

?>