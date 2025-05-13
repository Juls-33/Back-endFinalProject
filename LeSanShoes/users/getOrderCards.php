<?php
// session_start();
include("../includes/logic/config.php");

if (!isset($_SESSION['username'])) {
    http_response_code(403);
    echo "Unauthorized.";
    exit;
}

$username = $_SESSION['username'];

// Get user's orders
$orderQuery = mysqli_query($conn, "SELECT * FROM orders_tbl WHERE username = '$username' ORDER BY order_id DESC");

if (mysqli_num_rows($orderQuery) > 0) {
    echo "<div class='w-100'>";
    
    while ($order = mysqli_fetch_assoc($orderQuery)) {
        $order_id = $order['order_id'];
        $status = $order['status'];
        $total = number_format($order['total_price'], 2);

        // Get order items
        $itemsQuery = mysqli_query($conn, "
            SELECT cw.colorway_name, cw.image1
            FROM order_items_tbl oit
            JOIN colorway_size_tbl cs ON oit.colorway_size_id = cs.colorway_size_id
            JOIN colorway_tbl cw ON cs.colorway_id = cw.colorway_id
            WHERE oit.order_id = '$order_id'
        ");

        $colorwayNames = [];
        $thumbnails = "";
        while ($item = mysqli_fetch_assoc($itemsQuery)) {
            $colorwayNames[] = $item['colorway_name'];
            $imagePath = '../uploads/' . $item['image1'];
            $thumbnails .= "<img src='$imagePath' alt='' class='img-thumbnail me-2 mb-2' style='width: 60px; height: 60px; object-fit: cover;'>";
        }

        $colorwayList = implode(', ', $colorwayNames);
        $cancelDisabled = ($status !== 'Pending' && $status !== 'Out for Delivery');
        $cancelBtn = $cancelDisabled
            ? "<button class='btn btn-outline-secondary btn-sm' disabled>Cancel</button>"
            : "<button class='btn btn-outline-danger btn-sm cancel-order-btn' data-order-id='$order_id'>Cancel</button>";
        echo "
        <div class='card mb-4 border-danger-subtle shadow-sm w-100'>
            <div class='card-body'>
                <div class='d-flex flex-wrap align-items-start'>
                    <div class='d-flex flex-wrap me-3' style='max-width: 200px;'>
                        $thumbnails
                    </div>
                    <div class='flex-grow-1'>
                        <h5 class='card-title'><strong>Order ID: $order_id</strong></h5>
                        <p class='mb-1'><strong>Status:</strong> $status</p>
                        <p class='mb-1'><strong>Items:</strong> <small class='text-muted'>$colorwayList</small></p>
                        <div class='d-flex justify-content-between align-items-center mt-3'>
                            <p class='mb-0'><strong>Total:</strong> Php $total</p>
                            <div class='d-flex justify-content-between align-items-center mt-3'>
                                <p class='mb-0'><strong>Total:</strong> Php $total</p>
                                $cancelBtn
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }

    echo "</div>";
} else {
    echo "<p class='text-center text-muted'>You have no previous orders.</p>";
}