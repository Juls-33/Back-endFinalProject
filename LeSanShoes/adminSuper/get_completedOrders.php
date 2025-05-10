<?php
    
    // Database connection
    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query for completed orders
    $sql = "SELECT COUNT(*) AS completed_count FROM orders_tbl WHERE status = 'completed'";
    $result = $conn->query($sql);

    $completedCount = 0;
    if ($result && $row = $result->fetch_assoc()) {
        $completedCount = (int)$row['completed_count'];
    }

    echo $completedCount;
?>