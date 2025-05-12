<?php
include("../includes/logic/config.php");

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

if (!isset($_POST['username'])) {
    http_response_code(400);
    echo json_encode(["error" => "Username is required"]);
    exit;
}

$username = $_POST['username'];

$query = " SELECT 
    o.order_id,
    o.username,
    o.status,
    o.total_price,
    GROUP_CONCAT(DISTINCT c.colorway_name SEPARATOR ', ') as colorway_names
FROM 
    orders_tbl o
LEFT JOIN 
    order_items_tbl oi ON o.order_id = oi.order_id
LEFT JOIN 
    colorway_tbl c ON oi.colorway_id = c.colorway_id
WHERE 
    o.username = '$username'
GROUP BY 
    o.order_id
";

$result = $conn->query($query);

if ($result === false) {
    http_response_code(500);
    echo json_encode(["error" => $conn->error]);
    exit;
}

$data = $result->fetch_all(MYSQLI_ASSOC);

// Format the data
$formattedData = array();
foreach ($data as $order) {
    $formattedOrder = array(
        "order_id" => $order['order_id'],
        "username" => $order['username'],
        "status" => $order['status'],
        "total_price" => number_format($order['total_price'], 2),
        "colorway_name" => $order['colorway_names']
    );
    array_push($formattedData, $formattedOrder);
}

echo json_encode($formattedData);
?>