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
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="../user/css/products.css"/> -->
  <style>
  </style>
  <link rel="stylesheet" href="userTest.css">
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
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
          </ul>
          <div class="d-lg-flex flex-lg-row align-items-center gap-2">
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

  <!-- Footer -->
  <br><br>
  <footer class="text-white text-center text-lg-start w-100" style="width: 100%; background-color: #B51E1E;">
    <div class="p-4" style="max-width: 100%;">
      <div class="d-flex flex-wrap justify-content-around text-start">
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

        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Products</h5>
          <ul>
            <li class="mb-2"> <a href="products.php?brand=Anta" class="text-white">Anta</a></li>
            <li class="mb-2"><a href="products.php?brand=Nike" class="text-white">Nike</a></li>
            <li class="mb-2"><a href="products.php?brand=Under" class="text-white">Under Armour</a></li>
            <li class="mb-2"><a href="products.php?brand=Adidas" class="text-white">Adidas</a></li>
            <li class="mb-2"><a href="products.php?brand=Asics" class="text-white">Asics</a></li>
            <li class="mb-2"><a href="products.php?brand=Jordan" class="text-white">Jordan</a></li>
          </ul>
        </div>

        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Useful Links</h5>
          <ul>
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="products.php" class="text-white">Products</a></li>
            <li class="mb-2"><a href="faq.php" class="text-white">FAQ</a></li>
            <li class="mb-2"><a href="#" class="text-white">Cart</a></li>
          </ul>
        </div>

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
    <script src="runningshoes.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

  <!-- User Modal for login/logout -->
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

  <script>


    $('#colorwaySearch').on('input', function () {
      const searchTerm = $(this).val().toLowerCase();
      $('.colorway-card').each(function () {
        const text = $(this).attr('data-search').toLowerCase();
        $(this).toggle(text.includes(searchTerm));
      });
    });


    document.getElementById('leftBtn').addEventListener('click', function() {
  document.getElementById('cardContainer').scrollBy({
    left: -300, /* Scroll left by 300px */
    behavior: 'smooth'  /* Smooth scroll */
  });
});

document.getElementById('rightBtn').addEventListener('click', function() {
  document.getElementById('cardContainer').scrollBy({
    left: 300,  /* Scroll right by 300px */
    behavior: 'smooth'  /* Smooth scroll */
  });
});


document.getElementById('leftBtn1').addEventListener('click', function() {
  document.getElementById('runningCardContainer').scrollBy({
    left: -300, /* Scroll left by 300px */
    behavior: 'smooth'  /* Smooth scroll */
  });
});

document.getElementById('rightBtn1').addEventListener('click', function() {
  document.getElementById('runningCardContainer').scrollBy({
    left: 300,  /* Scroll right by 300px */
    behavior: 'smooth'  /* Smooth scroll */
  });
});
  </script>
</body>
</html>
