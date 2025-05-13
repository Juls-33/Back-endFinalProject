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
    <link rel="stylesheet" href="../header-footer/header-footer.css">
     <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <!-- <link rel="stylesheet" href="userTest.css"> -->
  <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
  <script src="../assets/swal/sweetalert2.min.js"></script>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>
<link rel="stylesheet" href="productpage.css">
</head>

<body>
  <?php include('../header-footer/header.php'); ?>

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
<?php include('modals.php'); ?>
<?php include('../header-footer/footer.php'); ?>

<script src="productsPageMiddleware.js"></script>
<script src="editUserMiddleware.js"></script>
<script src="ppageMiddleware.js"></script>
  <script src="filters.js"></script>
  <script src="orderDetailsMiddleware.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
