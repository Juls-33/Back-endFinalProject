<?php
include("../includes/logic/config.php");

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo "Unauthorized: Please log in.";
    exit;
}
    try{
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $obj = json_decode($_POST["myJson"]);
            $username = $_SESSION['username'];
            $action = $obj ->action;
            if (isset($action)) {
                switch ($action){
                    case 'addToCart':
                        $colorway_size_id = $obj ->colorway_size_id;
                        $qty = $obj ->qty;
                        $total = $obj ->total;
                        $date_created = date('Y-m-d H:i:s');

                        $stmt = $conn->prepare("INSERT INTO cart_tbl(username, colorway_size_id, quantity, total_price, date_created, date_updated) VALUES (?, ?, ?, ?, ?,?)");
                        $stmt->bind_param("siidss", $username, $colorway_size_id, $qty, $total, $date_created, $date_created);
                        if ($stmt->execute()) {
                            echo "New record is saved.";
                        } else {
                            echo "Error";
                        }
                        $stmt->close();
                    break;                
                }
            }
        }
    }
    catch(Exception $e){
        http_response_code(404);
    }


?>

