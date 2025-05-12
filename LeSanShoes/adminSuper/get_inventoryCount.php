<?php

    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $inventory_sql = "SELECT SUM(stock) AS total FROM colorway_size_tbl";
    $result = $conn->query($inventory_sql);
    $inventoryCount = 0;
    
    if ($result && $row = $result->fetch_assoc()) {
        $inventoryCount = isset($row['total']) ? (int)$row['total'] : 0;
    }
    
    echo $inventoryCount;
?>