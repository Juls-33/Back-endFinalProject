<?php
session_start();
include("../includes/logic/config.php");

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo "Unauthorized: Please log in.";
    exit;
}

if (isset($_POST['colorway_id'], $_POST['size_id'], $_POST['quantity'], $_POST['total_price'])) {
    $colorwayId = intval($_POST['colorway_id']);
    $sizeId = intval($_POST['size_id']);
    $quantity = intval($_POST['quantity']);
    $totalPrice = floatval($_POST['total_price']);

    // Get username from session username
    $username = $_SESSION['username'];
    $userQuery = "SELECT username FROM users_tbl WHERE username = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult->num_rows === 0) {
        http_response_code(403);
        echo "User not found.";
        exit;
    }

    $user = $userResult->fetch_assoc();
    $userId = $user['username'];

    // Get colorway_size_id
    $csQuery = "SELECT colorway_size_id FROM colorway_size_tbl WHERE colorway_id = ? AND size_id = ?";
    $stmt2 = $conn->prepare($csQuery);
    $stmt2->bind_param("ii", $colorwayId, $sizeId);
    $stmt2->execute();
    $csResult = $stmt2->get_result();

    if ($csResult->num_rows === 0) {
        http_response_code(404);
        echo "Size combination not found.";
        exit;
    }

    $cs = $csResult->fetch_assoc();
    $colorwaySizeId = $cs['colorway_size_id'];

    // Insert into cart_tbl
    $insertQuery = "INSERT INTO cart_tbl (username, colorway_size_id, quantity, total_price)
                    VALUES (?, ?, ?, ?)";
    $stmt3 = $conn->prepare($insertQuery);
    $stmt3->bind_param("siid", $userId, $colorwaySizeId, $quantity, $totalPrice);

    if ($stmt3->execute()) {
        echo "Item added to cart successfully.";
    } else {
        http_response_code(500);
        echo "Error: " . $conn->error;
    }

} else {
    http_response_code(400);
    echo "Missing required fields.";
}
?>
