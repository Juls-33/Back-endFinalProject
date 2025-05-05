<?php
session_start();

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lesanshoes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define global constants
define('ROOT_PATH', realpath(dirname(__FILE__)));
define('INCLUDE_PATH', realpath(dirname(__FILE__) . '/includes'));
define('BASE_URL', 'http://localhost/BackEndFinalProject/LeSanShoes/');

// Utility functions
function getSingleRecord($sql, $types, $params) {
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}
?>
