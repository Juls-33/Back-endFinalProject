<?php
// Include database connection file
include("configAndrei.php");

// Define the relative path to serve images
$dbUpload_dir = "assets/images/"; // Public access path for images

// SQL query to get shoe model data along with image paths
$sql = "SELECT 
            sm.shoe_model_id,
            sm.model_name,
            sm.description,
            c.image1,
            c.image2,
            c.image3,
            c.image4,
            b.brand_name AS brand_name
        FROM shoe_model_tbl sm
        JOIN brand_tbl b ON sm.brand_id = b.brand_id
        LEFT JOIN colorway_tbl c ON sm.shoe_model_id = c.shoe_model_id
        ORDER BY sm.model_name ASC";

$result = $conn->query($sql);

// Array to store shoe models with image paths
$shoe_models = [];

while ($row = $result->fetch_assoc()) {
    // Add the relative image paths
    $row['image1'] = $dbUpload_dir . basename($row['image1']);
    $row['image2'] = $dbUpload_dir . basename($row['image2']);
    $row['image3'] = $dbUpload_dir . basename($row['image3']);
    $row['image4'] = $dbUpload_dir . basename($row['image4']);
    
    // Add the shoe model data to the array
    $shoe_models[] = $row;
}

// Return the shoe models as JSON
echo json_encode([
    "shoe_models" => $shoe_models
]);

?>
