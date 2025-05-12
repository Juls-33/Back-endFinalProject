<?php
include("../includes/logic/config.php");
if (isset($_POST['id'])) {
    $modelId = mysqli_real_escape_string($conn, $_POST['id']);
    
    $sql = "SELECT image1, image2, image3, image4 FROM colorway_tbl WHERE colorway_id = '$modelId'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $images = array(
            $row['image1'],
            $row['image2'],
            $row['image3'],
            $row['image4']
        );
        echo json_encode($images);
    } else {
        echo json_encode([]);
    }
}
mysqli_close($conn);
?>