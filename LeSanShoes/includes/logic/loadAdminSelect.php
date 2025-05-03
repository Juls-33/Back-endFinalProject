<?php
include("config.php");

$role = $_POST['role'] ?? '';
$options = '<option value="" disabled selected>Open this select menu</option>';

switch ($role) {
    case 'admin':
        $sql = "SELECT username FROM users_tbl WHERE roles_id = 3";
        break;
    case 'superadmin':
        $sql = "SELECT username FROM users_tbl WHERE roles_id = 2";
        break;
    case 'all':
        $sql = "SELECT username FROM users_tbl WHERE roles_id IN (2, 3)";
        break;
    default:
        echo $options;
        exit;
}

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $username = htmlspecialchars($row['username']);
    $options .= "<option value='{$username}'>{$username}</option>";
}
echo $options;
?>