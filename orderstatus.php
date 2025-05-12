<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <title>Document</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    flex-direction: column;

}
html, body {
  overflow-x: hidden;
  height: 100%;
  margin: 0;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
main {
  flex: 1 0 auto; /* Take remaining vertical space */
}
footer {
  flex-shrink: 0; /* Prevent footer from shrinking */
}

/* Navbar css */
.navbar-brand, .nav-link, .navbar-text {
    color: #B51E1E !important;
    font-weight: bold;
}

img {
    width: 100%;
    height: 100%;
}

.logo-class {
    width: 8rem;
    height: 4rem;
    display: flex;
}

.material-symbols-outlined{
  color: #B51E1E;
  font-size: 3rem;
}

.icon-text {
  color: #B51E1E;
  font-weight: bold;
  font-size: 18px;
}


a{
    text-decoration: none;
    color: #555;
}
p{
    color: #000000;
}
.header{
    border: #B51E1E solid;
}

/* Main css */
main{
    padding-left: 15vw;
    padding-right: 15vw;
    margin-top: 3vh;
    margin-bottom: 8vh;
}
h2{
    padding-bottom: 2vh;
}
h4{
    margin-top: 20px;
}
.card-text{
    font-size: large;
}
.total{
    margin: 5px;
}
.list-group{
    margin-bottom: 1rem;
}
.list-group-item {
    display: flex; /* Flex layout for alignment */
    align-items: center; /* Center items vertically */
}
.mt-3 {
    margin-top: 1rem; /* Adjust margin as needed */
}

.btn-link {
    text-decoration: none; /* Remove link underline */
    color: black; /* Adjust color for the link */
    font-weight: 500; /* Font weight adjustment */
    padding-left: 0;
}

.btn-primary {
    background-color: black; /* Set button background to black */
    color: white; /* Set text color to white */
    padding: 0.5rem 1rem; /* Adjust padding for button */
}

.d-flex {
    display: flex; /* Enable flexbox */
}

.justify-content-between {
    justify-content: space-between; /* Space elements evenly */
    width: 100%; /* Ensure full width */
}
.img-fluid {
    object-fit: cover;
    height: 100%;
    }
.shoes {
    width: 60px; /* Set the width of product image */
    height: auto; /* Keep the aspect ratio */
    margin-right: 10px; /* Spacing between image and text */
}
.list-group-item {
    display: flex; /* Flex layout for alignment */
    align-items: center; /* Center items vertically */
}
</style>
</head>
<body>
    <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <div class="logo-class">
          <img src="LeSanShoes/assets/images/sanshoes logo.png" alt="Bootstrap" width="100" height="100">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="../users/index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="../users/products.php">Products</a></li>
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
            <span class="material-symbols-outlined d-none d-lg-inline" id="openCartBtn" data-bs-toggle="modal" data-bs-target="#cartModal">shopping_cart</span>
            <span class="icon-text d-inline d-lg-none" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</span>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>

<main>
    <div class="container-fluid">
        <h2 class="text-center" style="color:#B51E1E;">Order History</h2>
        <div class="row row-cols-1">
            <div class="col">
                <div class="card mb-3" style="width: 100%; cursor:pointer; border-color:#5f0000;" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong>Order ID: 038526624</strong></h5>
                        <p class="card-text"><strong>Status: Pending</strong></p>
                        <p class="card-text">
                            <medium class="text-muted">Nike Vomero, Adidas Shibal, Anta ga Suki, etc.</medium>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text mb-2"><strong>Total: Php 6969.69</strong></p>
                            <button class="btn btn-outline-danger mb-3 ms-2">
                            Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add new Card here -->
        </div>
    </div>
</main>

<!-- <div class="col-md-4" style="padding-left: 10px;">
    <img src="user-homepage/images/pdimg/kai1.jpg" class="img-fluid rounded-start" alt="Nike V2K Run" style="object-fit: contain;">
</div> -->
<!-- Modal -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="orderID"><strong>Order ID: 038526624</strong></p>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="orderStatus mb-2"><strong>Status: Pending</strong></p>
                    <button class="btn btn-outline-danger mb-4">
                     Cancel
                    </button>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="LeSanShoes/assets/images/VOMERO+5+BG.jpg" alt="Nike Book 1 EP 'Flagstaff'" class="img-fluid shoes">
                        <div>
                            <p class="mb-1">Nike Book 1 EP 'Flagstaff'</p>
                            <small>10.5</small>
                        </div>
                        <span class="ms-auto">₱7,895.00</span>
                    </li>
                    <li class="list-group-item">
                        <img src="LeSanShoes/assets/images/VOMERO+5+BG.jpg" alt="Nike Air More Uptempo Slide" class="img-fluid shoes">
                        <div>
                            <p class="mb-1">Nike Air More Uptempo Slide</p>
                            <small>11</small>
                        </div>
                        <span class="ms-auto">₱4,995.00</span>
                    </li>
                    <li class="list-group-item">
                        <img src="LeSanShoes/assets/images/VOMERO+5+BG.jpg" alt="Air Jordan 1 Retro High OG 'Rare Air'" class="img-fluid shoes">
                        <div>
                            <p class="mb-1">Air Jordan 1 Retro High OG 'Rare Air'</p>
                            <small>10.5</small>
                        </div>
                        <span class="ms-auto">₱9,895.00</span>
                    </li>
                    <li class="list-group-item">
                        <img src="LeSanShoes/assets/images/colorway_6815f567d9c15.jpg" alt="Anta Kai 2 'Solar Return'" class="img-fluid shoes">
                        <div>
                            <p class="mb-1">Anta Kai 2 'Solar Return'</p>
                            <small>9</small>
                        </div>
                        <span class="ms-auto">₱7,995.00</span>
                    </li>
                </ul>

                <div class="mt-3">
                    <h5 class="total">Total: <span class="float-end">PHP ₱30,780.00</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <li class="mb-2"><a href="#" class="text-white">Home</a></li>
            <li class="mb-2"><a href="#" class="text-white">Products</a></li>
            <li class="mb-2"><a href="#" class="text-white">FAQ</a></li>
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
</body>
</html>