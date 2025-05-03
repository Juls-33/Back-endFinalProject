<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="login_Updatedstyletwo.css">
    
  </head>
  <body>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center my-login-page">
      <div class="login-box p-5 w-100" style="max-width: 50%;">
        <h2 class="mb-3">Welcome Back!</h2>
        <p class="mb-4">Enter your email and password to open your account</p> 

        <form class="login-form">
          <div class="mb-3">
            <label for="userEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="userEmail" placeholder="Enter your email address" maxlength="100">
          </div>

          <div class="mb-3 position-relative">
            <div class="password_labels">
              <label for="userPassword" class="form-label">Password</label>
              <a href="newpassword.php" class="options mt-2">Forgot your Password?</a>
            </div>
            <div class = "password-wrapper">
                <input type="password" class="form-control" id="userPassword" placeholder="Enter your password" maxlength="100">
                <span class="material-symbols-outlined toggle-password" id="togglePassword">visibility_off</span>
            </div>
          </div>

        <div class="check-login mb-3">
            <div class="checkbox-container">
                <input type="checkbox" class="form-check-input" id="rememberCheck">
                <label class="form-check-label" for="rememberCheck">Keep me signed in</label>
            </div>
            <button type="submit" class="btn btn-dark login-btn w-50 rounded-0 ">Login</button>
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
          <div class="toast-body" id="toastMessage">
            <!-- Validation message will appear here -->
          </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
  const toggle = document.getElementById('togglePassword');
  const password = document.getElementById('userPassword');

  toggle.addEventListener('click', () => {
    const isPassword = password.type === 'password';
    password.type = isPassword ? 'text' : 'password';
    toggle.textContent = isPassword ? 'visibility' : 'visibility_off';
  });

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
      e.preventDefault(); // Prevent actual submission

      // Clear previous highlights
      document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

      const requiredFields = [
        { id: 'userEmail', name: 'email' },
        { id: 'userPassword', name: 'password' },
      ];

      for (let field of requiredFields) {
        const input = document.getElementById(field.id);
        if (!input || !input.value.trim()) {
          input.classList.add('is-invalid');
          showToast(`${field.name} is required`);
          input.focus();
          return;
        }
      }
      form.submit();
    });

</script>




