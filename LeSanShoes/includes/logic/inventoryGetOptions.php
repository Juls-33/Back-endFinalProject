<?php
include("config.php");
function getOptions($conn, $table, $id_field, $name_field) {
    $result = $conn->query("SELECT $id_field, $name_field FROM $table");
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row[$id_field]}'>{$row[$id_field]}: {$row[$name_field]}</option>";
    }
    return $options;
}


?>