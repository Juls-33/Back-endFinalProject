<?php
include("config.php");

try{
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // Brands query
        $brand_sql = "SELECT brand_id, brand_name, date_created, date_updated FROM brand_tbl";
        $brand_result = $conn->query($brand_sql);
        $brands = [];

        while ($row = $brand_result->fetch_assoc()) {
            $brands[] = $row;
        }

        // Categories query
        $category_sql = "SELECT category_id, category_name, date_created, date_updated FROM category_tbl";
        $category_result = $conn->query($category_sql);
        $categories = [];

        while ($row = $category_result->fetch_assoc()) {
            $categories[] = $row;
        }
        // shoes gender query
        $shoes_gender_sql = "SELECT shoes_gender_id, shoes_gender_name, date_created, date_updated FROM shoes_gender_tbl";
        $shoes_gender_result = $conn->query($shoes_gender_sql);
        $shoes_gender = [];

        while ($row = $shoes_gender_result->fetch_assoc()) {
            $shoes_gender[] = $row;
        }

        // status query
        $status_sql = "SELECT status_id, status_name, date_created, date_updated FROM status_tbl";
        $status_result = $conn->query($status_sql);
        $statusData = [];

        while ($row = $status_result->fetch_assoc()) {
            $statusData[] = $row;
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
            "roles" => $roles
        ]);
    }
}
catch(Exception $e){
    http_response_code(404);
}

?>