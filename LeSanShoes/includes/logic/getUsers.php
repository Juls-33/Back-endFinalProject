
<?php
include("config.php");

try{
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // users query
        $sql = "SELECT username, CONCAT(fname, ' ', lname) AS full_name, email, birthday, user_address, contact, date_created, date_updated, last_login 
        FROM users_tbl 
        WHERE roles_id=1";

        $result = $conn->query($sql);
        $users = [];

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        // admins users
        $sql = "SELECT username, CONCAT(fname, ' ', lname) AS full_name, email, roles_id, contact, date_created, date_updated, last_login 
        FROM users_tbl 
        WHERE roles_id IN (2, 3)";

        $result = $conn->query($sql);
        $admins = [];

        while ($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }

        echo json_encode([
            "users" => $users,
            "admins" => $admins,
        ]);
    }
}
catch(Exception $e){
    http_response_code(404);
}

?>