<?php
include("configAndrei.php");



function getRunningShoes($conn, $table, $id_field, $name_field) {
    $result = $conn->query("SELECT $id_field, $name_field FROM $table");
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row[$id_field]}'>{$row[$id_field]}: {$row[$name_field]}</option>";
    }
    return $options;
}

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $sql = "SELECT 
                    sm.shoe_model_id,
                    sm.model_name,
                    sm.description,
                    c.image1,
                    b.brand_name AS brand_name,
                    cat.category_name
                FROM shoe_model_tbl sm
                JOIN brand_tbl b ON sm.brand_id = b.brand_id
                JOIN category_tbl cat ON sm.category_id = cat.category_id
                LEFT JOIN colorway_tbl c ON sm.shoe_model_id = c.shoe_model_id
                WHERE sm.category_id = 2
                ORDER BY sm.model_name ASC";

        $result = $conn->query($sql);
        $shoe_models = [];

        while ($row = $result->fetch_assoc()) {
            $shoe_models[] = $row;
        }

        echo json_encode([
            "shoe_models" => $shoe_models
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
?>

