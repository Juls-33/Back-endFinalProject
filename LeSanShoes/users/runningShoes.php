

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
                    c.colorway_id,
                    sm.model_name,
                    c.colorway_name,
                    c.price,
                    c.image1,
                    b.brand_name,
                    COALESCE(SUM(cs.stock), 0) AS total_stock
                FROM colorway_tbl c
                LEFT JOIN shoe_model_tbl sm ON sm.shoe_model_id = c.shoe_model_id
                LEFT JOIN brand_tbl b ON sm.brand_id = b.brand_id
                LEFT JOIN colorway_size_tbl cs ON cs.colorway_id = c.colorway_id
                 WHERE sm.category_id = 2
                GROUP BY c.colorway_id
                ";

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

