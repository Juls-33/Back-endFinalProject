<?php
include("config.php");

try{
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // Brands query
        $brand_sql = "SELECT brand_id, brand_name, date_created, date_updated, modified_by FROM brand_tbl";
        $brand_result = $conn->query($brand_sql);
        $brands = [];

        while ($row = $brand_result->fetch_assoc()) {
            $brands[] = $row;
        }

        // Categories query
        $category_sql = "SELECT category_id, category_name, date_created, date_updated, modified_by FROM category_tbl";
        $category_result = $conn->query($category_sql);
        $categories = [];

        while ($row = $category_result->fetch_assoc()) {
            $categories[] = $row;
        }
        // shoes gender query
        $shoes_gender_sql = "SELECT shoes_gender_id, shoes_gender_name, date_created, date_updated, modified_by FROM shoes_gender_tbl";
        $shoes_gender_result = $conn->query($shoes_gender_sql);
        $shoes_gender = [];

        while ($row = $shoes_gender_result->fetch_assoc()) {
            $shoes_gender[] = $row;
        }

        // status query
        $status_sql = "SELECT status_id, status_name, date_created, date_updated, modified_by FROM status_tbl";
        $status_result = $conn->query($status_sql);
        $statusData = [];

        while ($row = $status_result->fetch_assoc()) {
            $statusData[] = $row;
        }
        // Materials query
        $material_sql = "SELECT material_id, material_name, date_created, date_updated, modified_by FROM material_tbl";
        $material_result = $conn->query($material_sql);
        $materials = [];

        while ($row = $material_result->fetch_assoc()) {
            $materials[] = $row;
        }
        // Tractions query
        $traction_sql = "SELECT traction_id, traction_name, date_created, date_updated, modified_by FROM traction_tbl";
        $traction_result = $conn->query($traction_sql);
        $tractions = [];

        while ($row = $traction_result->fetch_assoc()) {
            $tractions[] = $row;
        }
        // Supports query
        $support_sql = "SELECT support_id, support_name, date_created, date_updated, modified_by FROM support_tbl";
        $support_result = $conn->query($support_sql);
        $supports = [];

        while ($row = $support_result->fetch_assoc()) {
            $supports[] = $row;
        }
        // Technologies query
        $technology_sql = "SELECT technology_id, technology_name, date_created, date_updated, modified_by FROM technology_tbl";
        $technology_result = $conn->query($technology_sql);
        $technologies = [];

        while ($row = $technology_result->fetch_assoc()) {
            $technologies[] = $row;
        }
        // Sizes query
        $size_sql = "SELECT size_id, size_name, date_created, date_updated, modified_by FROM size_tbl";
        $size_result = $conn->query($size_sql);
        $sizes = [];

        while ($row = $size_result->fetch_assoc()) {
            $sizes[] = $row;
        }
        // roles query
        $roles_sql = "SELECT roles_id, roles_name, roles_desc, date_created, date_updated FROM roles_tbl";
        $roles_result = $conn->query($roles_sql);
        $roles = [];

        while ($row = $roles_result->fetch_assoc()) {
            $roles[] = $row;
        }

        echo json_encode([
            "brands" => $brands,
            "categories" => $categories,
            "shoes_gender" => $shoes_gender,
            "statusData" => $statusData,
            "materials" => $materials,
            "tractions" => $tractions,
            "supports" => $supports,
            "technologies" => $technologies,
            "sizes" => $sizes,
            "roles" => $roles
        ]);
    }
}
catch(Exception $e){
    http_response_code(404);
}

?>