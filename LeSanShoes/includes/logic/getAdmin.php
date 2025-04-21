<?php
include("config.php");

$sql = "SELECT username, email, roles_id, date_created, last_login 
        FROM users_tbl 
        WHERE roles_id IN (2, 3)";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(["data" => $data]);
?>