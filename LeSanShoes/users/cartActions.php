<?php
require '../includes/logic/config.php'; // Adjust path as needed

if (!isset($_POST['action'])) {
    echo json_encode(['error' => 'No action provided']);
    exit;
}

$action = $_POST['action'];

switch ($action) {
    case 'getSizesForColorway':
        if (!isset($_POST['colorway_id'])) {
            echo json_encode(['error' => 'Missing colorway_id']);
            exit;
        }

        $colorway_id = $_POST['colorway_id'];
        $stmt = $conn->prepare("
            SELECT s.size_id, s.size_name
            FROM colorway_size_tbl cst
            JOIN size_tbl s ON cst.size_id = s.size_id
            WHERE cst.colorway_id = ? AND cst.stock > 0
        ");
        $stmt->bind_param("i", $colorway_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $sizes = [];
        while ($row = $result->fetch_assoc()) {
            $sizes[] = [
                'size_id' => $row['size_id'],
                'size_name' => $row['size_name']
            ];
        }
        echo json_encode($sizes);
        break;

    case 'updateCartQuantity':
        if (!isset($_POST['cart_id'], $_POST['quantity'])) {
            echo json_encode(['error' => 'Missing cart_id or quantity']);
            exit;
        }

        $cart_id = $_POST['cart_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        $stmt = $conn->prepare("UPDATE cart_tbl SET quantity = ?, total_price = quantity * ? WHERE cart_id = ?");
        $stmt->bind_param("iid", $quantity, $price, $cart_id);
        $stmt->execute();

        echo json_encode(['success' => true]);
        break;

    case 'deleteCartItem':
        if (!isset($_POST['cart_id'])) {
            echo json_encode(['error' => 'Missing cart_id']);
            exit;
        }

        $cart_id = $_POST['cart_id'];

        $stmt = $conn->prepare("DELETE FROM cart_tbl WHERE cart_id = ?");
        $stmt->bind_param("i", $cart_id);
        $stmt->execute();

        echo json_encode(['success' => true]);
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
}
