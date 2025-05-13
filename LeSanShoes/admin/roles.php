<?php
    $servername = "localhost";
    $database = "lesanshoes_db";
    $username = "root";
    $password = "";

    
    $conn = new mysqli($servername, $username, $password, $database);

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query: Count users who logged in today, grouped by role
    $sql = "
        SELECT r.roles_name, COUNT(*) AS count
        FROM users_tbl u
        JOIN roles_tbl r ON u.roles_id = r.roles_id
        GROUP BY r.roles_name
    ";

    

    $result = $conn->query($sql);

    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['roles_name']] = (int)$row['count'];
        }
    }

    // Return as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
?>
