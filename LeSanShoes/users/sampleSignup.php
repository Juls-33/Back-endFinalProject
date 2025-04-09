
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LeSanShoes - Sign up</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/display_profile_image.js"></script>
  <!-- Middleware JS -->
  <script src="../assets/js/signupMiddleware.js"></script>
  <!-- SWAL -->
  <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
  <script src="../assets/swal/sweetalert2.min.js"></script>
</head>
<body>
  <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form>
            <h2 class="text-center">Sign up</h2>
            <hr>
            <div class="form-group">
              <label class="control-label" for="username">Username</label>
              <input type="text" id="username" name="username" class="form-control" maxLength='100' required>
            </div>
            <div class="form-group">
              <label class="control-label" for="email">Email Address</label>
              <input type="email" id="email" name="email" class="form-control" maxLength='100' required>
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" maxLength='100' required>
            </div>
            <div class="form-group">
              <label class="control-label" for="passwordConf">Password confirmation</label>
              <input type="password" id="passwordConf" name="passwordConf" class="form-control" maxLength='100' required>
            </div>  
            <div class="form-group" style="text-align: center;">
              <img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
              <!-- hidden file input to trigger with JQuery  -->
              <input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">
            </div>
            <div class="form-group">
              <button type="button" name="signup_btn" value="signup_btn" class="btn btn-success btn-block"  onclick="signUp()">Sign up</button>
            </div>
            <p>Aready have an account? <a href="sampleLogin.php">Log in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div> 
</body>
</html>
