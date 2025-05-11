<?php
// productpage.php
// Connect to your database
include("../Back-endFinalProject/LeSanShoes/includes/logic/config.php");
// Get the ID from URL
if (isset($_GET['id'])) {
  $modelId = mysqli_real_escape_string($conn, $_GET['id']);
  
  // Query the database for the shoe model details
  $sql = "SELECT 
              cw.image1,
              cw.image2,
              cw.image3,
              cw.image4,
              cw.colorway_name,
              cw.price,
              sm.model_name,
              sm.description,
              bt.brand_name,
              ct.category_name,
              mt.material_name,
              st.support_name,
              tt.technology_name,
              tr.traction_name,
              sg.shoes_gender_name
            FROM 
                colorway_tbl cw
            INNER JOIN 
                shoe_model_tbl sm ON cw.shoe_model_id = sm.shoe_model_id
            INNER JOIN 
                brand_tbl bt ON sm.brand_id = bt.brand_id
            INNER JOIN 
                category_tbl ct ON sm.category_id = ct.category_id
            INNER JOIN 
                material_tbl mt ON sm.material_id = mt.material_id
            INNER JOIN 
                support_tbl st ON sm.support_id = st.support_id
            INNER JOIN 
                technology_tbl tt ON sm.technology_id = tt.technology_id
            INNER JOIN 
                traction_tbl tr ON sm.traction_id = tr.traction_id
            INNER JOIN 
                shoes_gender_tbl sg ON sm.shoes_gender_id = sg.shoes_gender_id
            WHERE 
                sm.shoe_model_id = '$modelId'";

  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Display your product details here
      ?>
      <!DOCTYPE html>
      <html>
      <head>
        <title>Product Details</title>
      </head>
      <body>
        <h1><?php echo $row['model_name']; ?></h1>
        <p>Brand: <?php echo $row['brand_name']; ?></p>
        <img src="<?php echo $row['image1']; ?>" alt="Product Image">
        <!-- Add more images or details as needed -->
      </body>
      </html>
      <?php
    }
  } else {
    // No results found
    echo "No product found with that ID";
  }
} else {
  // ID not provided
  echo "No ID provided";
}
// Close connection
mysqli_close($conn);
?>