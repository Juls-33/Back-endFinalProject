<?php
include("../includes/logic/config.php");

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

$username = $_SESSION['username'];

echo json_encode(["username" => $username]);
?>