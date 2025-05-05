<?php 
    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $pass = "";

    $conn = new mysqli($servername, $username, $pass, $database);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $query = "SELECT DAYNAME(date) as day, SUM(amount) as total FROM sales_tbl GROUP BY day ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')";
    $result = $conn->query($query);

    $data = [];
    $labels = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['day'];  
        $data[] = (int)$row['total'];
    }

    //$conn->close();

    echo json_encode(['labels' => $labels, 'data' => $data]);
    
?>