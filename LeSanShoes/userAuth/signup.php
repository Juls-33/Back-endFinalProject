<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LeSanShoes - Sign up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Custom Scripts -->
        <script type="text/javascript" src="assets/js/display_profile_image.js"></script>
        <script src="../includes/logic/signupMiddleware.js"></script>
        <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
        <script src="../assets/swal/sweetalert2.min.js"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/css/customUserAuth.css">
    </head>
    <body>
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
    </body>
</html>