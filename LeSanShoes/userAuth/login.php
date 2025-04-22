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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LeSanShoes - Login</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="assets/js/display_profile_image.js"></script> -->
        <!-- Middleware JS -->
        <script src="../includes/logic/loginMiddleware.js"></script>
        <!-- SWAL -->
        <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
        <script src="../assets/swal/sweetalert2.min.js"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        <link rel="stylesheet" href="../assets/css/customUserAuth.css">
    </head>
    <body>
        <div class="form-wrapper">
            <form>
                <h2>Welcome Back!</h2>
                <p>Enter your email and password to open your account</p>
                <hr>
                <div class="form-group">
                    <label class="control-label" for="username">Username or Email</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your email"  maxLength='100' required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" maxLength='100' required>
                    <a class="options" href="newpassword.php">Forgot your Password?</a>
                </div>
                <!-- <div class="checkbox-row">
                    <input type="checkbox" id="signed">
                    <label for="signed">Keep me signed in</label>
                </div>
                <br> -->
                <div class="form-group">
                    <button type="button" name="login_btn" class="btn btn-success btn-block" onclick="login()">Login</button>
                </div>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </div>
    </body>
 </html>