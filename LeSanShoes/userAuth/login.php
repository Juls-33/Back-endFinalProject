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
  <title>LeSanShoes - Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" 
  crossorigin="anonymous"></script>
  <!-- Middleware JS -->
  <script src="../includes/logic/loginMiddleware.js"></script>
  <script type="text/javascript" src="assets/js/display_profile_image.js"></script>
  <!-- SWAL -->
  <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
  <script src="../assets/swal/sweetalert2.min.js"></script>  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
  <link rel="stylesheet" href="../assets/css/customUserAuth.css">
  <!-- Header and Footer -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
  <script src="../assets/js/user.js" defer></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>    
  <link rel="stylesheet" href="../header-footer/header-footer.css">
  <meta charset="utf-8">
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
                    <li class="nav-item"><a class="nav-link" href="../users/products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="../users/faq.php">FAQ</a></li>
                </ul>
                <div class="d-lg-flex flex-lg-row align-items-center gap-2">
                        <!-- <span class="material-symbols-outlined d-none d-lg-inline cursor-pointer" style="cursor:pointer; pointer-events: auto;" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" title="View Orders">
                            receipt_long
                        </span>
                        <div class="d-flex d-lg-none align-items-center mb-2">
                        <span class="icon-text d-inline d-lg-none cursor-pointer" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                            View Orders
                        </span>
                        </div>
                        <span class="material-symbols-outlined d-none d-lg-inline cursor-pointer" style="cursor:pointer; pointer-events: auto;" id="openCartBtn" data-bs-toggle="modal" data-bs-target="#cartModal" title="View Cart">
                            shopping_cart
                        </span> -->
                    <div class="d-flex d-lg-none align-items-center mb-2">
                      <span class="icon-text d-inline d-lg-none cursor-pointer" id="openCartBtn" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</span>
                    </div>
                    <div class="dropdown mb-1">
                        <div class="d-flex align-items-center" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Profile">
                            <span class="material-symbols-outlined d-none d-lg-inline">account_circle</span>
                            <span class="icon-text d-inline d-lg-none">User  Account</span>
                        </div>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <?php if (isset($_SESSION["username"])): ?>
                                <li class="dropdown-item text-muted">Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../userAuth/logoutUser .php">Logout</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="../userAuth/login.php">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
  <main>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center form-wrapper">
      <form class="signupForm">
        <h2 class="mb-3">Welcome Back!</h2>
        <p class="mb-4">Enter your username/email and password to open your account</p>  
        <hr>
         <div class="form-group">
            <label class="control-label" for="username">Username or Email</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your email" maxLength="100" required>
          </div>

         <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" maxLength="100" required>
          </div>
         <div class="form-group d-flex justify-content-center">
                 <button type="button" name="login_btn" class="btn btn-danger btn-block mt-3 mb-2 w-100" onclick="login()">Login</button>
            </div>
            <p class="text-center">Don't have an account? <a href="signup.php">Sign up</a></p>
      </form>
    </div>
<!-- Toast for Error -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastErrorMessage">
                <!-- Error message will appear here -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
 <!-- Toast for Confirmation -->
    <div id="confirmationToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastConfirmationMessage">
                <!-- Confirmation message will appear here -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
</main>
<!-- Footer -->
<br><br>
<footer class="text-white text-center text-lg-start w-100" style="background-color: #B51E1E; color: white;">
  <style>
    footer a,
    footer p,
    footer li,
    footer h5,
    footer i {
      color: white !important;
    }

    footer a:hover {
      color: #ddd !important;
    }
  </style>
  <div class="p-4">
    <div class="d-flex flex-wrap justify-content-around text-start">

      <!-- Column 1 -->
      <div class="p-3" style="min-width: 250px; max-width: 300px;">
        <div class="shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto">
          <img src="../assets/images/sanshoes logo white.png" height="70" alt="" loading="lazy" />
        </div>
        <p class="text-center">Find your perfect pair and step into comfort and style</p>
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
          <li class="mb-2"><a href="products.php?brand=Anta" class="text-white">Anta</a></li>
          <li class="mb-2"><a href="products.php?brand=Nike" class="text-white">Nike</a></li>
          <li class="mb-2"><a href="products.php?brand=Under" class="text-white">Under Armour</a></li>
          <li class="mb-2"><a href="products.php?brand=Adidas" class="text-white">Adidas</a></li>
          <li class="mb-2"><a href="products.php?brand=Asics" class="text-white">Asics</a></li>
          <li class="mb-2"><a href="products.php?brand=Jordan" class="text-white">Jordan</a></li>
        </ul>
      </div>

      <!-- Column 3 -->
      <div class="p-3" style="min-width: 250px; max-width: 300px;">
        <h5 class="text-uppercase mb-4">Useful Links</h5>
        <ul>
          <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
          <li class="mb-2"><a href="#" class="text-white">Products</a></li>
          <li class="mb-2"><a href="faq.php" class="text-white">FAQ</a></li>
          <li class="mb-2"><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#cartModal">Cart</a></li>
        </ul>
      </div>

      <!-- Column 4 -->
      <div class="p-3" style="min-width: 250px; max-width: 300px;">
        <h5 class="text-uppercase mb-4">Contact</h5>
        <ul class="list-unstyled">
          <li><p><i class="fas fa-map-marker-alt pe-2"></i>Biringan City, Philippines</p></li>
          <li><p><i class="fas fa-phone pe-2"></i>+63 984 467 7856</p></li>
          <li><p><i class="fas fa-envelope pe-2 mb-0"></i>juls_33@gmail.com</p></li>
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
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.signupForm');
        const errorToastElement = document.getElementById('errorToast');
        const confirmationToastElement = document.getElementById('confirmationToast');


        // Toast notification function
        function showToast(message, type = 'error') {
            console.log(`Show Toast: ${message} - Type: ${type}`); // 
            if (type === 'confirmation') {
                document.getElementById('toastConfirmationMessage').textContent = message;
                confirmationToastElement.classList.add('show'); // Assuming Bootstrap toast
            } else {
                document.getElementById('toastErrorMessage').textContent = message;
                errorToastElement.classList.add('show'); // Assuming Bootstrap toast
            }
        }

        window.login = function () {
            // Clear previous error states
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

            const requiredFields = [
                { id: 'username', name: 'Email' },
                { id: 'password', name: 'Password' },
            ];

            // Validate required fields
            for (let field of requiredFields) {
                const input = document.getElementById(field.id);
                if (!input || !input.value.trim()) {
                    input?.classList.add('is-invalid');
                    showToast(`${field.name} is required`);
                    return;
                }
            }
             var formData = {
                  action: 'login',
                  username: document.getElementById("username").value.trim(),
                  user_password: document.getElementById("password").value.trim(),
              };

              var jsonString = JSON.stringify(formData);
              $.ajax({
                  url: "../includes/logic/userAuthToDB.php", 
                  type: "POST",
                  data: {myJson : jsonString},
                  success: function(response) {
                      let res;
                      try {
                          res = JSON.parse(response);
                      } catch (e) {
                          Swal.fire({
                              icon: "error",
                              title: "Unexpected response from server",
                              text: response
                          });
                          return;
                      }
                  
                      if (res.status === "success") {
                          if (res.roles_id == 1) {
                              window.location.href = "../users/index.php";
                          } else if (res.roles_id == 3) {
                              window.location.href = "../admin/DashboardAdmin.php";
                          } else if(res.roles_id == 2){
                              window.location.href = "../adminSuper/DashboardSuperAdmin.php";
                          }
                          else {
                              Swal.fire({
                                  icon: "warning",
                                  title: "Unknown role",
                                  text: "No redirection configured for this role."
                              });
                          }
                      } else {
                          Swal.fire({
                              icon: "error",
                              title: "Login failed",
                              text: res.message
                          });
                          setTimeout(() => window.location.href = 'login.php', 2000);
                          return;
                      }
                  },
                  error: function() {
                      // Handle any errors that occur during the request
                      Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: 'Something went wrong! Username already exist',
                      });
                  }
              });

            // If all validations pass
            showToast('Login successfully!', 'confirmation');
            setTimeout(() => window.location.href = 'index.php', 2000);
        };
    });
</script>
