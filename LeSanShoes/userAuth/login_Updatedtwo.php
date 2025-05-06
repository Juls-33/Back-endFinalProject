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
</head>
<body>
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


