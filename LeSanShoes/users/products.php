<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basketball Shoes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/css/products.css"/>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>
<link rel="stylesheet" href="productpage.css">
</head>

<body>
  <header>
    <div class="ad">
      <div class="ad-text">
        <h2>Limited Time Offer 20% off for All Shoes! Contact Us Now</h2>
      </div>
    </div>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <div class="logo-class">
            <img src="../assets/images/sanshoes logo.png" alt="Bootstrap" width="100" height="100">
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="../users/index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
          </ul>
          <div class="d-lg-flex flex-lg-row align-items-center gap-2">
              <!-- <div><a href="../userAuth/login.php">Login</a></div>
              <p>Username: <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?></p>
              <a href="../userAuth/logoutUser.php">Logout</a> -->
              <div class="mb-2" role="button" data-bs-toggle="modal" data-bs-target="#userModal">
            <span class="material-symbols-outlined d-none d-lg-inline">account_circle</span>
            <span class="icon-text d-inline d-lg-none">User Account</span>
          </div>
            <div>
              <span class="material-symbols-outlined d-none d-lg-inline">shopping_cart</span>
              <span class="icon-text d-inline d-lg-none">Cart</span>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
     <div class="header">
   <div class="pic">
    <img src="../assets/images/jordan.jpg">
   </div>
  </div>

  
    <div class="container mt-4">
      <div class="row">
        <!-- Filters -->
        <div class="col-md-3">
          <h4>Filters</h4>
          <div class="accordion" id="filtersAccordion">
            <!-- Gender Filter -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterGender">
                  Gender
                </button>
              </h2>
              <div id="filterGender" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="men"> <label for="men">Men</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="women"> <label for="women">Women</label>
                  </div>
                </div>
              </div>
            </div>

        
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterActivity">
                  Activity
                </button>
              </h2>
              <div id="filterActivity" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="running"> <label for="running">Running</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="basketball"> <label for="basketball">Basketball</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lifestyle"> <label for="lifestyle">Lifestyle</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterBrand">
                  Brand
                </button>
              </h2>
              <div id="filterBrand" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Anta"> <label for="Anta">Anta</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Nike"> <label for="Nike">Nike</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="UnderArmour"> <label for="UnderArmour">Under Armour</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Adidas"> <label for="Adidas">Adidas</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Product Display -->
        <div class="col-md-9">
          <h4>Shoes</h4>
          <div class="container mt-4">
            <div class="row gy-4 card-container" id="cardContainer"></div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Product Detail Modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productDetailModalLabel">Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- We'll fill this dynamically -->
         <div class="container-fluid main">
          <div class="row row-cols-1 row-cols-lg-2 g-5">
              <div class="col-12 col-lg-9">
              <div class="row row-cols-1 row-cols-md-2 g-1">
                  <div class="col">
                      <div class="img-zoom" 
                          style="background-image: url('user-homepage/images/pdimg/kai1.jpg'); height: 400px;"
                          onmousemove="zoom(event, this)"
                          onmouseleave="resetZoom(this)"
                          onmouseenter="this.style.backgroundSize = '150%'"
                          onclick="openModal(0)"></div>
                  </div>
                  <div class="col">
                      <div class="img-zoom" 
                          style="background-image: url('user-homepage/images/pdimg/kai2.jpg'); height: 400px;"
                          onmousemove="zoom(event, this)"
                          onmouseleave="resetZoom(this)"
                          onmouseenter="this.style.backgroundSize = '150%'"
                          onclick="openModal(1)"></div>
                  </div>
                  <div class="col">
                      <div class="img-zoom" 
                          style="background-image: url('user-homepage/images/pdimg/kai3.jpg'); height: 400px;"
                          onmousemove="zoom(event, this)"
                          onmouseleave="resetZoom(this)"
                          onmouseenter="this.style.backgroundSize = '150%'"
                          onclick="openModal(2)"></div>
                  </div>
                  <div class="col">
                      <div class="img-zoom" 
                          style="background-image: url('user-homepage/images/pdimg/kai4.jpg'); height: 400px;"
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
                          <h3><i>Basketball</i></h3>
                          <h3><strong>Kaiju 1</strong></h3>
                      </div>

                      <div class = "productPriceSize">
                          <h4><strong>Php 5,400</strong></h4>
                      </div>

                      <p class = "productText">
                          A Kai-ju Sotto Type of Footwear that makes you become the Monster that Kai Sotto the G.O.A.T is!
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
                                              <li>Model: Kaiju 1</li>
                                              <li>Color: Colorful</li>
                                              <li>Material: Premium Leather + Rubber</li>
                                              <li>Weight: 450 grams</li>
                                          </ul>
                                      </div>
                                      <div class="col">
                                          <ul class="list-group">
                                              <li>Traction: Rubber Outsole</li>
                                              <li>Support: High Ankle</li>
                                              <li>Technology: Impact Protection</li>
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
        <p><strong>Model:</strong> <span id="modalModelName"></span></p>
        <p><strong>Brand:</strong> <span id="modalBrandName"></span></p>
        <img id="modalImage" src="" class="img-fluid" alt="Shoe Image">
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
 <br> <br>
 <footer class="text-white text-center text-lg-start w-100" style="width: 100%; background-color: #B51E1E;">
    <div class="p-4" style="max-width: 100%;">
      <div class="d-flex flex-wrap justify-content-around text-start">
        <!-- Column 1 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <div class="shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto">
            <img src="../assets/images/sanshoes logo white.png" height="70" alt="" loading="lazy" />
          </div>
          <p class="text-center" style="color: white;">Find your perfect pair and step into comfort and style</p>
          <ul class="list-unstyled d-flex justify-content-center">
            <li><a class="text-white px-2" href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a class="text-white px-2" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="text-white px-2" href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
  
        <!-- Column 2 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Products</h5>
          <ul>
            <li class="mb-2"><a href="#" class="text-white">Anta</a></li>
            <li class="mb-2"><a href="#" class="text-white">Nike</a></li>
            <li class="mb-2"><a href="#" class="text-white">Under Armour</a></li>
            <li class="mb-2"><a href="#" class="text-white">Adidas</a></li>
          </ul>
        </div>
  
        <!-- Column 3 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Useful Links</h5>
          <ul>
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="#" class="text-white">Products</a></li>
            <li class="mb-2"><a href="faq.php" class="text-white">FAQ</a></li>
            <li class="mb-2"><a href="#" class="text-white">Cart</a></li>
          </ul>
        </div>
  
        <!-- Column 4 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Contact</h5>
          <ul class="list-unstyled">
            <li><p class="text-white"><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p></li>
            <li><p class="text-white"><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p></li>
            <li><p class="text-white"><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p></li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">LeSanShoes.com</a>
    </div>
  </footer>
  <script src="productsPageMiddleware.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">User Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <?php if (isset($_SESSION["username"])): ?>
          <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></p>
          <a href="../userAuth/logoutUser.php" class="btn btn-danger">Logout</a>
        <?php else: ?>
          <p>You are not logged in.</p>
          <a href="../userAuth/login.php" class="btn btn-primary">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
