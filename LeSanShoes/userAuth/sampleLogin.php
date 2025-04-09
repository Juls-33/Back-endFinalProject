<?php
session_start();

if (isset($_SESSION['username'])) {
    // User is already logged in — redirect based on role
    if ($_SESSION['roles_id'] == 1) {
        header("Location: ../users/sampleIndex.php"); 
    } else {
        header("Location: ../admin/sampleAdminPage.php"); 
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
        <!-- Custom styles -->
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
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
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form>
                <h2 class="text-center">Login</h2>
                <hr>
                <div class="form-group">
                    <label class="control-label" for="username">Username or Email</label>
                    <input type="text" name="username" id="username" class="form-control" maxLength='100' required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" maxLength='100' required>
                </div>
                <div class="form-group">
                    <button type="button" name="login_btn" class="btn btn-success" onclick="login()">Login</button>
                </div>
                <p>Don't have an account? <a href="sampleSignup.php">Sign up</a></p>
                </form>
            </div>
            </div>
        </div>
    </div>
    </body>
 </html>