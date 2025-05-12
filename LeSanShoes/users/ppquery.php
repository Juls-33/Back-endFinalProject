<?php
include("../includes/logic/config.php");
$isLoggedIn = isset($_SESSION['username']);
// Get the ID from URL
if (isset($_POST['id'])) {
  $modelId = mysqli_real_escape_string($conn, $_POST['id']);
  
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
              tr.traction_name
            FROM 
                shoe_model_tbl sm
            JOIN 
                colorway_tbl cw ON cw.shoe_model_id = sm.shoe_model_id
            LEFT JOIN 
                brand_tbl bt ON sm.brand_id = bt.brand_id
            LEFT JOIN 
                category_tbl ct ON sm.category_id = ct.category_id
            LEFT JOIN 
                material_tbl mt ON sm.material_id = mt.material_id
            LEFT JOIN 
                support_tbl st ON sm.support_id = st.support_id
            LEFT JOIN 
                technology_tbl tt ON sm.technology_id = tt.technology_id
            LEFT JOIN 
                traction_tbl tr ON sm.traction_id = tr.traction_id
            WHERE 
                cw.colorway_id = '$modelId'";

  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo "<pre><strong>SQL Error:</strong> " . mysqli_error($conn) . "</pre>";
    echo "<pre><strong>Query:</strong> $sql</pre>";
}
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $sizeSql = "SELECT cs.colorway_size_id, s.size_name, cs.stock
                    FROM colorway_size_tbl cs 
                    JOIN size_tbl s ON cs.size_id = s.size_id 
                    WHERE cs.colorway_id = '$modelId'";
        $sizeResult = mysqli_query($conn, $sizeSql);
        $_SESSION['model_name'] = $row['model_name'];
        $sizesWithStock = [];
        if ($sizeResult && mysqli_num_rows($sizeResult) > 0) {
            while ($sizeRow = mysqli_fetch_assoc($sizeResult)) {
                $sizesWithStock[] = [
                    'size_name' => $sizeRow['size_name'],
                    'stock' => $sizeRow['stock'],
                    'colorway_size_id' => $sizeRow['colorway_size_id']
                ];
            }
        }
      ?>
      <div class="container-fluid main">
        <div class="row row-cols-1 row-cols-lg-2 g-5">
            <div class="col-12 col-lg-9">
            <div class="row row-cols-1 row-cols-md-2 g-1">
                <div class="col">
                    <div  id="mainProductImage" class="img-zoom"
                         style="background-image: url('<?php echo $row['image1']; ?>'); height: 400px;" data-index="0"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(0)"></div>
                </div>
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image2']; ?>'); height: 400px;" data-index="1"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(1)"></div>
                </div>
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image3']; ?>'); height: 400px;" data-index="2"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(2)"></div>
                </div>
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image4']; ?>'); height: 400px;" data-index="3"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(3)"></div>
                </div>
            </div>
            </div>

            <div class="col-12 col-lg-3" id = "productDesc">
                <div class ="productDesc">
                    <div class = "productTitle">
                        <h3><i><?php echo $row['category_name']; ?></i></h3>
                        <h3><strong><?php echo $row['colorway_name']; ?></strong></h3>
                    </div>

                    <div class = "productPriceSize">
                        <h4><strong>₱ <?php echo $row['price']; ?></strong></h4>
                    </div>

                    <p class = "productText">
                        <?php echo $row['description']; ?>
                    </p><br>

                    <div class="row row-cols-2">
                        <div class="col-8 col-lg-7 col-sm-9">
                            <p> Avaiilable Sizes </p>
                        </div>
                        <div class="col-4 col-lg-5 col-sm-3">
                            <div class="d-flex align-items-center" id = "sizes">
                            <i class="material-icons me-2">
                                straighten
                            </i>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#sizeChartModal">
                            Size Chart
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-3 row-cols-xl-3 row-cols-lg-2 g-2">
                        <?php
                        $counter = 1;
                        foreach ($sizesWithStock as $size) {
                            $id = "option$counter";
                            $disabled = $size <= 0 ? 'disabled' : '';
                            $class = $size <= 0 ? 'unavailable text-muted' : '';
                        ?>
                            <div class="col">
                                <input type="radio" class="btn-check" name="options-size" id="<?php echo $id; ?>" autocomplete="off" <?php echo $disabled; ?> data-size-id="<?php echo $size['colorway_size_id']; ?>">
                                <label class="btn btn-outline-secondary size-button <?php echo $class; ?>" for="<?php echo $id; ?>" data-stock="<?php echo $size['stock']; ?>">
                                    <?php echo $size['size_name']; ?>
                                </label>
                            </div>
                        <?php
                            $counter++;
                        }
                        ?>
                        
                    </div>
                    <br>    
                        <p>Quantity:</p>
                        <div class="mt-3 d-flex align-items-center">
                            <button class="btn btn-sm btn-outline-secondary me-2" id="qty-decrease">-</button>
                            <span id="qty-count" class="px-3">1</span>
                            <button class="btn btn-sm btn-outline-secondary ms-2" id="qty-increase">+</button>
                        </div>
                        <input type="hidden" id="selected-size-stock" value="0">
                    <br>

                    <button class="btn btn-primary btn-lg addtoCart"  <?php if (!$isLoggedIn) echo 'data-auth="false"'; ?>>Add To Cart</button>

                    
                    <div class="accordion accordion-spacing accordion-flush" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <ul class="list-group">
                                            <li>Model: <?php echo $row['model_name']; ?></li>
                                            <li>Color: <?php echo $row['colorway_name']; ?></li>
                                            <li>Material: <?php echo $row['material_name']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group">
                                            <li>Traction: <?php echo $row['traction_name']; ?></li>
                                            <li>Support: <?php echo $row['support_name']; ?></li>
                                            <li>Technology: <?php echo $row['technology_name']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Shipping & Returns
                              </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse">
                              <div class="accordion-body">
                                <strong>SanShoes currently offers free standard nationwide shipping in the Philippines.</strong><br><br>

                                Metro Manila Orders: 5-7 business days <br><br>
                                
                                Provincial Orders: 7-20 business days <br><br>
                                
                                Any order (regular priced and sale items) made through SanShoes is eligible for return within seven (7) days from the date the item was delivered.<br><br> Orders must be returned with a dated sales invoice/receipt and the product’s original and complete packaging for it to be accepted.
                              </div>
                            </div>
                          </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
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