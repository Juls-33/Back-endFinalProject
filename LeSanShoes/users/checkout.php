<?php
include("../includes/logic/config.php");

try {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['items']) || !is_array($input['items'])) {
        http_response_code(400);
        echo "Invalid data format.";
        exit;
    }

    foreach ($input['items'] as $item) {
        $cartId = intval($item['cart_id']);

        // Example action: mark item as checked out
        $stmt = $conn->prepare("UPDATE cart_tbl SET status='checked_out' WHERE cart_id=?");
        $stmt->bind_param("i", $cartId);
        $stmt->execute();
    }

    echo json_encode(["message" => "Checkout successful!"]);

} catch (Exception $e) {
    http_response_code(500);
    echo "Error processing checkout.";
}
?>
