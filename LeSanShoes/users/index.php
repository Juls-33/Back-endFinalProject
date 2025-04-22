<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
  <script src="../assets/js/user.js" defer></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>    
  <link rel="stylesheet" href="../assets/css/user.css"/>
  <style>
    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }
  </style>
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
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
        </ul>
        <div class="d-lg-flex flex-lg-row align-items-center gap-2">
            <!-- temporary login and logout -->
            <div><a href="../userAuth/login.php">Login</a></div>
            <p>Username: <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?></p>
            <a href="../userAuth/logoutUser.php">Logout</a>
            <!-- end of temporary login and logout -->
          <div class="mb-2">
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
    <div class="container">
      <div class="row">
        <div class="col-2">
          <h1>Give your Workout <br>A New Style!</h1>
          <p>Success isn't always about greatness. It's about consistency. Consistent<br>hard work gains success. Greatness will come.</p>
          <a href="products.html" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="col-2">
          <img src="../assets/images/image1.png" alt="Hero">
        </div>
      </div>
    </div>
  </div>

  <div class="shoeSlide">
    <div class="shoeSlide-header">
      <h2>NEWEST IN THE GAME</h2>
    </div>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
        <li class="card">
          <div class="img"><img src="../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>

        <li class="card">
          <div class="img"><img src="../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>
        <li class="card">
          <div class="img"><img src="../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>
        <li class="card">
          <div class="img"><img src="../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>
        <li class="card">
          <div class="img"><img src="../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>
        <li class="card">
          <div class="img"><img src="../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>
        <li class="card">
          <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
          <h2>Nike </h2>
          <span id="model">Vomero 5</span>
          <span>₱6,395</span>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </div>

  <div class="brandContainer">
    <div class="shoeSlide-header mb-5">
      <h2>SHOP BY BRAND</h2>
    </div>
    <div class="brands">
      <div class="row row-cols-auto justify-content-center g-3">
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../assets/../assets/images/kyrie.jpg" class="card-img-top" alt="ANTA">
            <div class="card-body p-2 text-center">
              <p class="card-text small">ANTA</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../assets/../assets/images\sabrina.jpg" class="card-img-top" alt="ANTA">
            <div class="card-body p-2 text-center">
              <p class="card-text small">NIKE</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../assets/../assets/images\stephen.jpg" class="card-img-top" alt="ANTA">
            <div class="card-body p-2 text-center">
              <p class="card-text small">UNDER ARMOUR</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../assets/../assets/images\harden.jpg" class="card-img-top" alt="ANTA">
            <div class="card-body p-2 text-center">
              <p class="card-text small">ADIDAS</p>
            </div>
          </div>
        </div>
      </div>
     
      <div class="shoeSlide">
        <div class="shoeSlide-header">
          <h2>RUNNING BEST SELLERS</h2>
        </div>
        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <ul class="carousel">
            <li class="card">
              <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
              <h2>Nike Vomero 5</h2>
              <span>₱6,395</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
              <h2>Nike Vomero 5</h2>
              <span>₱6,395</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
              <h2>Nike Vomero 5</h2>
              <span>₱6,395</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
              <h2>Nike Vomero 5</h2>
              <span>₱6,395</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
              <h2>Nike Vomero 5</h2>
              <span>₱6,395</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/../assets/images/VOMERO+5+BG.jpg" alt="Nike Vomero" draggable="false"></div>
              <h2>Nike Vomero 5</h2>
              <span>₱6,395</span>
            </li>
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
        </div>


        <div class="genderContainer">
          <div class="shoeSlide-header mb-5">
            <h2>SHOP BY GENDER</h2>
          </div>
          <div class="genders">
            <div class="row row-cols-auto justify-content-center g-5">
              <div class="col">
                <div class="card" style="width: 20rem;">
                  <img src="../assets/images/kyrie.jpg" class="card-img-top" alt="ANTA">
                  <div class="card-body p-2 text-center">
                    <p class="card-text small">MEN</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 20rem;">
                  <img src="../assets/images\sabrina.jpg" class="card-img-top" alt="ANTA">
                  <div class="card-body p-2 text-center">
                    <p class="card-text small">WOMEN</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 20rem;">
                  <img src="../assets/images\stephen.jpg" class="card-img-top" alt="ANTA">
                  <div class="card-body p-2 text-center">
                    <p class="card-text small">UNISEX</p>
                  </div>
                </div>
              </div>
            </div>




      </div>
    </div>
  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" 
  crossorigin="anonymous"></script>
</body>
</html>
