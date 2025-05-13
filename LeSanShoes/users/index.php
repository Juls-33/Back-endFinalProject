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
  <style>
  </style>
  <link rel="stylesheet" href="userTest.css">
  <link rel="stylesheet" href="productpage.css">
  <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
  <script src="../assets/swal/sweetalert2.min.js"></script>
</head>

<body>
<?php include('../header-footer/header.php'); ?>

<div>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-2">
          <h1>Give your Workout <br>A New Style!</h1>
          <p>Success isn't always about greatness. It's about consistency. Consistent<br>hard work gains success. Greatness will come.</p>
          <a href="products.php" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="col-2">
          <img src="../assets/images/image3.png" alt="Hero">
        </div>
      </div>
    </div>
  </div>


<div class="shoesTitle">
  <h1>NEWEST IN THE GAME</h1>
</div>
 <div class="container mt-4">
  <div class="card-container-wrapper">
    <button class="scroll-btn left" id="leftBtn">
      <span class="material-symbols-outlined">arrow_circle_left</span>
    </button>
    <div class="card-container" id="cardContainer">
      <!-- Dynamic shoe model cards will appear here -->
    </div>
    <button class="scroll-btn right" id="rightBtn">
      <span class="material-symbols-outlined">arrow_circle_right</span>
    </button>
  </div>
</div>




<div class="container my-5 brandContainer">
  <div class="mb-4 text-center shoesTitleColor">
    <h1 class="fw-bold">SHOP BY BRAND</h1>
  </div>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-6 g-4 justify-content-center">

    <div class="col d-flex justify-content-center">
      <a href="products.php?brand=Anta" class="text-decoration-none text-dark w-100" style="max-width: 220px;">
        <div class="card h-100">
          <img src="../assets/images/kyrie.jpg" class="card-img-top" alt="ANTA">
          <div class="card-body d-flex flex-column justify-content-end text-center p-2">
            <p class="card-text fs-6 fw-semibold mb-0">ANTA</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col d-flex justify-content-center">
      <a href="products.php?brand=Nike" class="text-decoration-none text-dark w-100" style="max-width: 220px;">
        <div class="card h-100">
          <img src="../assets/images/sabrina.jpg" class="card-img-top" alt="NIKE">
          <div class="card-body d-flex flex-column justify-content-end text-center p-2">
            <p class="card-text fs-6 fw-semibold mb-0">NIKE</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col d-flex justify-content-center">
      <a href="products.php?brand=Under" class="text-decoration-none text-dark w-100" style="max-width: 220px;">
        <div class="card h-100">
          <img src="../assets/images/stephen.jpg" class="card-img-top" alt="UNDER ARMOUR">
          <div class="card-body d-flex flex-column justify-content-end text-center p-2">
            <p class="card-text fs-6 fw-semibold mb-0">UNDER ARMOUR</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col d-flex justify-content-center">
      <a href="products.php?brand=Adidas" class="text-decoration-none text-dark w-100" style="max-width: 220px;">
        <div class="card h-100">
          <img src="../assets/images/harden.jpg" class="card-img-top" alt="ADIDAS">
          <div class="card-body d-flex flex-column justify-content-end text-center p-2">
            <p class="card-text fs-6 fw-semibold mb-0">ADIDAS</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col d-flex justify-content-center">
      <a href="products.php?brand=Asics" class="text-decoration-none text-dark w-100" style="max-width: 220px;">
        <div class="card h-100">
          <img src="../assets/images/asics.jpg" class="card-img-top" alt="ASICS">
          <div class="card-body d-flex flex-column justify-content-end text-center p-2">
            <p class="card-text fs-6 fw-semibold mb-0">ASICS</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col d-flex justify-content-center">
      <a href="products.php?brand=Jordan" class="text-decoration-none text-dark w-100" style="max-width: 220px;">
        <div class="card h-100">
          <img src="../assets/images/jordanPic.jpg" class="card-img-top" alt="JORDAN">
          <div class="card-body d-flex flex-column justify-content-end text-center p-2">
            <p class="card-text fs-6 fw-semibold mb-0">JORDAN</p>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>

<div class="runningContainer">
<div class="shoesTitle">
  <h1>RUNNING ESSENTIALS</h1>
</div>
  <div class="container mt-4">
  <div class="card-container-wrapper">
    <button class="scroll-btn left" id="leftBtn1">
      <span class="material-symbols-outlined">arrow_circle_left</span>
    </button>
    <div class="card-container" id="runningCardContainer">
      <!-- Dynamic shoe model cards will appear here -->
    </div>
    <button class="scroll-btn right" id="rightBtn1">
      <span class="material-symbols-outlined">arrow_circle_right</span>
    </button>
  </div>
</div>
</div>
    
    
  </main>

<?php include('modals.php'); ?>
<?php include('../header-footer/footer.php'); ?>

  <script src="productsPageMiddleware.js"></script>
  <script src="runningshoes.js"></script>
  <script src="ppageMiddleware.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
