<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SanShoes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <link rel="stylesheet" href="userTest.css">
  <link rel="stylesheet" href="productpage.css">
  <link rel="stylesheet" href="../header-footer/header-footer.css">
  <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
  <script src="../assets/swal/sweetalert2.min.js"></script>
</head>

<body>
<?php include('../header-footer/header.php'); ?>

<div>
  <div class="header">
    <div class="container">
      <div class="rowcart"> 
        <div class="col-2">
          <h1>Give your Workout <br>A New Style!</h1>
          <p>Success isn't always about greatness. It's about consistency. Consistent<br>hard work gains success. Greatness will come.</p>
          <a href="products.php" class="mbtn">Explore Now &#8594;</a>
        </div>
        <div class="col-2">
          <img src="../assets/images/image3.png" alt="Hero">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="mb-4 shoesTitleColor">
    <h1 class="fw-bold">NEWEST IN THE GAME</h1>
  </div>
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
 


<div class="container my-5">
  <div class="mb-4 shoesTitleColor">
    <h1 class="fw-bold text-center"></h1>
  </div>
</div>

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <a href="products.php?category=basketball" class="d-block w-100 position-relative">
        <img src="../assets/images/lebron.jpg" class="d-block w-100" alt="BASKETBALL">
        <div class="carousel-caption d-none d-md-block text-end custom-caption">
          <div class="d-inline-block text-center">
            <h2 class="fw-bold">BASKETBALL</h2>
            <span class="btn btn-light mt-2">Explore Now</span>
          </div>
        </div>
      </a>
    </div>

    <div class="carousel-item">
      <a href="products.php?category=running" class="d-block w-100 position-relative">
        <img src="../assets/images/bolt.jpg" class="d-block w-100" alt="RUNNING">
        <div class="carousel-caption d-none d-md-block text-end custom-caption">
          <div class="d-inline-block text-center">
            <h2 class="fw-bold">RUNNING</h2>
            <span class="btn btn-light mt-2">Explore Now</span>
          </div>
        </div>
      </a>
    </div>

    <div class="carousel-item">
      <a href="products.php?category=lifestyle" class="d-block w-100 position-relative">
        <img src="../assets/images/mbappe.jpg" class="d-block w-100" alt="LIFESTYLE">
        <div class="carousel-caption d-none d-md-block text-end custom-caption">
          <div class="d-inline-block text-center">
            <h2 class="fw-bold">LIFESTYLE</h2>
            <span class="btn btn-light mt-2">Explore Now</span>
          </div>
        </div>
      </a>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container my-5 brandContainer">
  <div class="mb-4 shoesTitleColor">
    <h1 class="fw-bold">SHOP BY BRAND</h1>
  </div>

  <!-- Arrow-enabled scroll wrapper -->
  <div class="card-container-wrapper">
    <button class="scroll-btn left" id="leftBtn2">
      <span class="material-symbols-outlined">arrow_circle_left</span>
    </button>

    <div class="scroll-wrapper d-flex overflow-auto gap-3 px-1" id="brandCardContainer">
      <!-- Brand cards -->
      <div class="brand-card flex-shrink-0">
        <a href="products.php?brand=Anta" class="text-decoration-none text-dark w-100">
          <div class="card h-100">
            <img src="../assets/images/kyrie1.jpg" class="card-img-top" alt="ANTA">
            <div class="card-body d-flex flex-column justify-content-end text-center p-2">
              <p class="card-text fs-6 fw-semibold mb-0">ANTA</p>
            </div>
          </div>
        </a>
      </div>

      <div class="brand-card flex-shrink-0">
        <a href="products.php?brand=Nike" class="text-decoration-none text-dark w-100">
          <div class="card h-100">
            <img src="../assets/images/sabrina1.jpg" class="card-img-top" alt="NIKE">
            <div class="card-body d-flex flex-column justify-content-end text-center p-2">
              <p class="card-text fs-6 fw-semibold mb-0">NIKE</p>
            </div>
          </div>
        </a>
      </div>

      <div class="brand-card flex-shrink-0">
        <a href="products.php?brand=Under" class="text-decoration-none text-dark w-100">
          <div class="card h-100">
            <img src="../assets/images/curry1.jpg" class="card-img-top" alt="UNDER ARMOUR">
            <div class="card-body d-flex flex-column justify-content-end text-center p-2">
              <p class="card-text fs-6 fw-semibold mb-0">UNDER ARMOUR</p>
            </div>
          </div>
        </a>
      </div>

      <div class="brand-card flex-shrink-0">
        <a href="products.php?brand=Adidas" class="text-decoration-none text-dark w-100">
          <div class="card h-100">
            <img src="../assets/images/harden1.jpg" class="card-img-top" alt="ADIDAS">
            <div class="card-body d-flex flex-column justify-content-end text-center p-2">
              <p class="card-text fs-6 fw-semibold mb-0">ADIDAS</p>
            </div>
          </div>
        </a>
      </div>

      <div class="brand-card flex-shrink-0">
        <a href="products.php?brand=Asics" class="text-decoration-none text-dark w-100">
          <div class="card h-100">
            <img src="../assets/images/asics1.jpg" class="card-img-top" alt="ASICS">
            <div class="card-body d-flex flex-column justify-content-end text-center p-2">
              <p class="card-text fs-6 fw-semibold mb-0">ASICS</p>
            </div>
          </div>
        </a>
      </div>

      <div class="brand-card flex-shrink-0">
        <a href="products.php?brand=Jordan" class="text-decoration-none text-dark w-100">
          <div class="card h-100">
            <img src="../assets/images/jordan1.jpg" class="card-img-top" alt="JORDAN">
            <div class="card-body d-flex flex-column justify-content-end text-center p-2">
              <p class="card-text fs-6 fw-semibold mb-0">JORDAN</p>
            </div>
          </div>
        </a>
      </div>
    </div>

    <button class="scroll-btn right" id="rightBtn2">
      <span class="material-symbols-outlined">arrow_circle_right</span>
    </button>
  </div>
</div>






<div class="runningContainer">
<div class="container my-5">
  <div class="mb-4 shoesTitleColor">
    <h1 class="fw-bold">RUNNING ESSENTIALS</h1>
  </div>
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
  <script>
  const leftBtn2 = document.getElementById("leftBtn2");
  const rightBtn2 = document.getElementById("rightBtn2");
  const brandContainer = document.getElementById("brandCardContainer");

  const scrollAmount = 350;

  leftBtn2.addEventListener("click", () => {
    brandContainer.scrollBy({ left: -scrollAmount, behavior: "smooth" });
  });

  rightBtn2.addEventListener("click", () => {
    brandContainer.scrollBy({ left: scrollAmount, behavior: "smooth" });
  });
</script>


<script src="editUserMiddleware.js"></script>
<?php include('modals.php'); ?>
<?php include('../header-footer/footer.php'); ?>

  <script src="productsPageMiddleware.js"></script>
  <script src="runningshoes.js"></script>
  <script src="ppageMiddleware.js"></script>
  <script src="orderDetailsMiddleware.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
