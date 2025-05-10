<?php
session_start();

if (isset($_SESSION['username'])) {
    // User is already logged in — redirect based on role
    if ($_SESSION['roles_id'] == 1) {
        header("Location: ../users/index.php"); 
    } else {
        header("Location: ../admin/DashboardAdmin.php"); 
    }
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LeSanShoes - Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Custom Middleware JS -->
    <script src="../includes/logic/loginMiddleware.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/customUserAuth.css">
    <!-- Header and Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="../assets/js/user.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>    
    <link rel="stylesheet" href="/Back-endFinalProject/LeSanShoes/assets/css/user.css">
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
            <li class="nav-item"><a class="nav-link" href="../users/andrei.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
          </ul>
          <div class="d-lg-flex flex-lg-row align-items-center gap-2">
            <div><a href="../userAuth/login.php">Login</a></div>
              <p>Username: <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?></p>
              <a href="../userAuth/logoutUser.php">Logout</a> 
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
    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100 bg-light">
      <form class="login-form">
        <h2 class="mb-3">Welcome Back!</h2>
        <p class="mb-4">Enter your email and password to open your account</p>
        <hr>
        <div class="mb-3">
          <label for="userEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="userEmail" name="email" placeholder="Enter your email address" maxlength="100">
        </div>

        <div class="mb-3 position-relative">
          <div class="d-flex justify-content-between align-items-center">
            <label for="userPassword" class="form-label">Password</label>
            <a href="newpassword.php" class="options">Forgot your Password?</a>
          </div>
          <div class="position-relative">
            <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter your password" maxlength="100">
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
            <label class="form-check-label" for="rememberCheck">Keep me signed in</label>
          </div>
          <button type="submit" class="btn btn-danger w-50">Login</button>
        </div>

        <div class="text-center">
          <a href="Signup_Updated.php" class="create-account">Create an Account</a>
        </div>
      </form>
    </div>
  </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
        <div id="validationToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
  </main>
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

<script>
    // Form validation logic
    const form = document.querySelector('.login-form');
    const toastElement = document.getElementById('validationToast');
    const toastMessage = document.getElementById('toastMessage');

    const showToast = (message) => {
        toastMessage.textContent = message;
        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    };

    form.addEventListener('submit', function (e) {
        const email = document.getElementById('userEmail');
        const pass = document.getElementById('userPassword');

        // Clear previous error states
        [email, pass].forEach(input => input.classList.remove('is-invalid'));

        if (!email.value.trim()) {
            e.preventDefault();
            email.classList.add('is-invalid');
            showToast("Email is required");
            email.focus();
            return;
        }

        if (!pass.value.trim()) {
            e.preventDefault();
            pass.classList.add('is-invalid');
            showToast("Password is required");
            pass.focus();
            return;
        }
    });
</script>


