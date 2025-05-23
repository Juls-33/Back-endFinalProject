<?php
include("config.php");
function getOptions($conn, $table, $id_field, $name_field) {
    $result = $conn->query("SELECT $id_field, $name_field FROM $table ORDER BY $id_field");
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row[$id_field]}'>{$row[$id_field]}: {$row[$name_field]}</option>";
    }
    return $options;
}



try{
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // Shoe model query
        $shoe_model_sql = "SELECT 
            sm.shoe_model_id,
            sm.model_name,
            sm.description,

            CONCAT(sm.brand_id, ': ', b.brand_name) AS brand_name,
            CONCAT(sm.category_id, ': ', c.category_name) AS category_name,
            CONCAT(sm.material_id, ': ', m.material_name) AS material_name,
            CONCAT(sm.traction_id, ': ', t.traction_name) AS traction_name,
            CONCAT(sm.support_id, ': ', s.support_name) AS support_name,
            CONCAT(sm.technology_id, ': ', tech.technology_name) AS technology_name,
            sm.date_created,
            sm.date_updated,
            sm.modified_by

        FROM shoe_model_tbl sm
        JOIN brand_tbl b ON sm.brand_id = b.brand_id
        JOIN category_tbl c ON sm.category_id = c.category_id
        JOIN material_tbl m ON sm.material_id = m.material_id
        JOIN traction_tbl t ON sm.traction_id = t.traction_id
        JOIN support_tbl s ON sm.support_id = s.support_id
        JOIN technology_tbl tech ON sm.technology_id = tech.technology_id
        ORDER BY sm.model_name ASC";

        $shoe_model_result = $conn->query($shoe_model_sql);
        $shoe_models = [];

        while ($row = $shoe_model_result->fetch_assoc()) {
            $shoe_models[] = $row;
        }

        
        $colorway_sql = "SELECT 
                    c.image1,
                    c.image2,
                    c.image3,
                    c.image4,
                    c.colorway_id,  
                    CONCAT(c.shoe_model_id, ': ', sm.model_name) AS model_name,
                    c.colorway_name,
                    c.price,
                    c.date_created,
                    c.date_updated,
                    c.modified_by
                    
                    FROM colorway_tbl c
                    JOIN shoe_model_tbl sm ON c.shoe_model_id = sm.shoe_model_id";
        $colorway_result = $conn->query($colorway_sql);

        $colorways = [];
        while ($row = $colorway_result->fetch_assoc()) {
            $colorways[] = $row;
        }


        // Colorway Size
        $colorway_size_sql = "SELECT 
                    cs.colorway_size_id,
                    CONCAT(cs.colorway_id, ': ',cw.colorway_name) AS colorway_id,
                    CONCAT(cs.size_id, ': ',sz.size_name) AS size_id,
                    cw.price,
                    cs.stock,
                    cs.date_created,
                    cs.date_updated,
                    cs.modified_by
                    FROM colorway_size_tbl cs
                    JOIN colorway_tbl cw ON cs.colorway_id = cw.colorway_id
                    JOIN size_tbl sz ON cs.size_id = sz.size_id";

        $colorway_size_result = $conn->query($colorway_size_sql);

        $colorway_sizes = [];
        while ($row = $colorway_size_result->fetch_assoc()) {
            $colorway_sizes[] = $row;
        }

        // $sql = "SELECT status_name FROM status_tbl";
        // $result = $conn->query($sql);
        // $statuses = [];

        // while ($row = $result->fetch_assoc()) {
        //     $statuses[] = $row['status_name'];
        // }

        
        echo json_encode([
        "shoe_models" => $shoe_models,
        "colorways" => $colorways,
        "colorway_sizes" => $colorway_sizes,
        ]);

            }
        }
catch(Exception $e){
    http_response_code(404);
}


?>