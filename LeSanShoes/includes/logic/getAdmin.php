<?php
include("config.php");

$sql = "SELECT username, CONCAT(fname, ' ', lname) AS full_name, email, roles_id, contact, date_created, date_updated, last_login 
        FROM users_tbl 
        WHERE roles_id IN (2, 3)";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(["data" => $data]);
?>