<?php
include("../includes/logic/config.php");

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}
try{
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_SESSION['username'];

    // echo $username;

    $sql = "SELECT c.cart_id, c.quantity, c.total_price, s.size_name, cm.colorway_name, cs.colorway_size_id, cm.colorway_id, cm.price, cm.image1, sm.model_name
            FROM cart_tbl c
            JOIN colorway_size_tbl cs ON c.colorway_size_id = cs.colorway_size_id
            JOIN size_tbl s ON cs.size_id = s.size_id
            JOIN colorway_tbl cm ON cs.colorway_id = cm.colorway_id
            JOIN shoe_model_tbl sm ON cm.shoe_model_id = sm.shoe_model_id
            WHERE c.username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $cartItems = [];
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }

    echo json_encode([
            "cartItems" => $cartItems
        ]);

}
}
catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server error"]);
} 

?>
