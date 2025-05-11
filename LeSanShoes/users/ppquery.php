<?php
// productpage.php
// Connect to your database
include("../includes/logic/config.php");
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
      <div class="container-fluid main">
        <div class="row row-cols-1 row-cols-lg-2 g-5">
            <div class="col-12 col-lg-9">
            <div class="row row-cols-1 row-cols-md-2 g-1">
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image1']; ?>'); height: 400px;"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(0)"></div>
                </div>
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image2']; ?>'); height: 400px;"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(1)"></div>
                </div>
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image3']; ?>'); height: 400px;"
                         onmousemove="zoom(event, this)"
                         onmouseleave="resetZoom(this)"
                         onmouseenter="this.style.backgroundSize = '150%'"
                         onclick="openModal(2)"></div>
                </div>
                <div class="col">
                    <div class="img-zoom"
                         style="background-image: url('<?php echo $row['image4']; ?>'); height: 400px;"
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
                        <h4><strong><?php echo $row['price']; ?></strong></h4>
                    </div>

                    <p class = "productText">
                        <?php echo $row['description']; ?>
                    </p><br>

                    <div class="row row-cols-2">
                        <div class="col-8 col-lg-7 col-sm-9">
                            <p> Sizes </p>
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
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option1" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option1">US 6</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option2" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option2">US 6.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option3" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option3">US 7</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option4" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option4">US 7.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option5" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option5">US 8</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option6" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option6">US 8.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option7" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option7">US 9</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option8" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option8">US 9.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option9" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option9">US 10</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option10" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button unavailable" for="option10">US 10.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option11" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option11">US 11</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option12" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option12">US 11.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option13" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option13">US 12</label>
                        </div>
                    </div>

                    <br>

                    <button class="btn btn-primary btn-lg addtoCart" data-bs-toggle="modal" data-bs-target="#addCartModal">Add To Cart</button>

                    
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