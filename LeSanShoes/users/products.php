<?php session_start(); 
?>
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
              <span class="material-symbols-outlined d-none d-lg-inline cursor-pointer" id="openCartBtn" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#cartModal" styl>
                shopping_cart </span>
                <span class="icon-text d-inline d-lg-none cursor-pointer" id="openCartBtn" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</span>
      
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
          
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterActivity">
                  Activity
                </button>
              </h2>
              <div id="filterActivity" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="running" value="running"> <label for="running">Running</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="basketball" value="basketball"> <label for="basketball">Basketball</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lifestyle" value="lifestyle"> <label for="lifestyle">Lifestyle</label>
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
  <input class="form-check-input" type="checkbox" id="Anta" value="Anta">
  <label for="Anta">Anta</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Nike" value="Nike">
  <label for="Nike">Nike</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Under" value="Under Armour">
  <label for="Under">Under Armour</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Adidas" value="Adidas">
  <label for="Adidas">Adidas</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Asics" value="Asics">
  <label for="Asics">Asics</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Jordan" value="Jordan">
  <label for="Jordan">Jordan</label>
</div>


  </div>
</div>
            </div>
          </div>
        </div>

        <!-- Product Display -->
        <div class="col-md-9">
          <h4>Shoes</h4>
          <input type="text" id="colorwaySearch" class="form-control mb-3" placeholder="Search products...">
          <div class="container mt-4">
            </div>
            <div class="row gy-4 card-container" id="cardContainer">
            
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
      </div>
    </div>
        <p><strong>Model:</strong> <span id="modalModelName"></span></p>
        <p><strong>Brand:</strong> <span id="modalBrandName"></span></p>
        <img id="modalImage" src="" class="img-fluid" alt="Shoe Image">
      </div>
    </div>
  </div>
</div>


<!-- cart modal -->
<?php include('cartModal.php'); ?>
<?php include('footer.php'); ?>

<script src="productsPageMiddleware.js"></script>
<script src="ppageMiddleware.js"></script>
  <script src="filters.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
