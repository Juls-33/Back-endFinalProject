<?php
    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $password = "";

    
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT SUM(amount) AS total_sales FROM sales_tbl";
    $result = $conn->query($sql);

    $total = 0;
    if ($result && $row = $result->fetch_assoc()) {
        $total = $row['total_sales'] ?? 0;
    }

    echo $total;
    

?>
