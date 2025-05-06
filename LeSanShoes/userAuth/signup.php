<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LeSanShoes - Sign up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" 
        crossorigin="anonymous"></script>
        <!-- Custom Scripts -->
        <script type="text/javascript" src="assets/js/display_profile_image.js"></script>
        <script src="../includes/logic/signupMiddleware.js"></script>
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
        <link rel="stylesheet" href="../assets/css/user.css"/>
        <style>
            ul{
                list-style: none;
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
            <div class="form-wrapper">
                <form id="signupForm">
                <h2 class="text-center">Sign up</h2>
                <hr>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" maxlength="100" required>
                </div>

                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" placeholder="Enter your firstname" class="form-control" maxlength="100" required>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" placeholder="Enter your lastname" class="form-control" maxlength="100" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="passwordConf">Password confirmation</label>
                    <input type="password" id="passwordConf" name="passwordConf" class="form-control" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthday</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" maxlength="250" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="number" id="contact" name="contact" class="form-control" min="0" onKeyPress="if(this.value.length==11) return false;" required>
                </div>

                <div class="checkbox">
                    <label>
                    <input type="checkbox" id="terms"> I agree to the <a href="#">terms and conditions</a>
                    </label>
                </div>

                <div class="form-group">
                    <button type="button" name="signup_btn" value="signup_btn" class="btn btn-success btn-block" onclick="signUp()">Sign up</button>
                </div>

                <p class="text-center">Already have an account? <a href="login.php">Log in</a></p>
                </form>
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