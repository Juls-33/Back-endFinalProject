<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LeSanShoes - Sign Up</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/customUserAuth.css" />

  <!-- JQuery + Bootstrap Bundle JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="../includes/logic/signupMiddleware.js"></script>
  <script src="../assets/swal/sweetalert2.min.js"></script>
  <style>
    ul {
      list-style: none;
      padding: 0%;
    }
    li{
      display: flex;
      align-items: center;
      list-style: none;
      margin-bottom: 8px;
    }
</style>
  
</head>
<body>
  <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center my-login-page">
    <form id="signupForm" class="login-form w-100" style="max-width: 600px;">
      <h2 class="text-center mb-4">Sign Up</h2>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" maxlength="100" required>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="fname" class="form-label">First name</label>
          <input type="text" id="fname" name="fname" class="form-control" maxlength="100" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lname" class="form-label">Last name</label>
          <input type="text" id="lname" name="lname" class="form-control" maxlength="100" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" maxlength="100" required>
      </div>

      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Password</label>
        <div class="password-wrapper">
          <input type="password" id="password" name="password" class="form-control" maxlength="100" required>
        </div>
      </div>

      <div class="mb-3 position-relative">
        <label for="passwordConf" class="form-label">Confirm Password</label>
        <div class="password-wrapper">
          <input type="password" id="passwordConf" name="passwordConf" class="form-control" maxlength="100" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="birthdate" class="form-label">Birthday</label>
        <input type="date" id="birthdate" name="birthdate" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" name="address" class="form-control" maxlength="250" required>
      </div>

      <div class="mb-3">
        <label for="contact" class="form-label">Contact Number</label>
        <input type="number" id="contact" name="contact" class="form-control" min="0" onKeyPress="if(this.value.length==11) return false;" required>
      </div>

      <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="terms" required>
        <label class="form-check-label" for="terms">
          I agree to the <a href="#" class="condition-link">terms and conditions</a>
        </label>
      </div>

      <div class="d-grid">
        <button type="button" class="btn btn-dark" onclick="signUp()">Sign Up</button>
      </div>

      <p class="text-center mt-3">Already have an account? <a href="login.php">Log in</a></p>
    </form>
  </div>

  <!-- Toast for validation (Optional Enhancement) -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
    <div id="validationToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="toastMessage">
          <!-- Validation message will appear here -->
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
</body>
</html>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const password2 = document.getElementById('passwordConf');
    const toastElement = document.getElementById('validationToast');
    const toastMessage = document.getElementById('toastMessage');
    const form = document.getElementById('signupForm');

    const requirements = [
      { test: (val) => val.length >= 10, text: 'At least 10 Characters' },
      { test: (val) => /[A-Z]/.test(val), text: 'One Uppercase letter' },
      { test: (val) => /[a-z]/.test(val), text: 'One lowercase letter' },
      { test: (val) => /\d/.test(val), text: 'One number' },
      { test: (val) => /[^A-Za-z0-9]/.test(val), text: 'One special character' }
    ];

    const getUpdatedContent = (value) => {
      return `<ul style="margin:0; padding-left: 1rem;">` +
        requirements.map(req => {
          const icon = req.test(value)
            ? '<span class="material-symbols-outlined" style="color: green; vertical-align: middle;">done</span>'
            : '<span class="material-symbols-outlined" style="color: gray; vertical-align: middle;">radio_button_unchecked</span>';
          return `<li style="margin-bottom: 0.5rem;">${icon} ${req.text}</li>`;
        }).join('') + `</ul>`;
    };

    const popover = new bootstrap.Popover(passwordInput, {
      html: true,
      trigger: 'focus',
      title: 'Password must:',
      content: getUpdatedContent('')
    });

    passwordInput.addEventListener('input', function () {
      popover.setContent({
        '.popover-body': getUpdatedContent(passwordInput.value)
      });
    });

    const showToast = (message) => {
      toastMessage.textContent = message;
      const toast = new bootstrap.Toast(toastElement);
      toast.show();
    };

    window.signUp = function () {
      // Clear previous errors
      document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

      const requiredFields = [
        { id: 'username', name: 'Username' },
        { id: 'fname', name: 'First Name' },
        { id: 'lname', name: 'Last Name' },
        { id: 'email', name: 'Email' },
        { id: 'password', name: 'Password' },
        { id: 'passwordConf', name: 'Confirm Password' },
        { id: 'birthdate', name: 'Birthday' },
        { id: 'address', name: 'Address' },
        { id: 'contact', name: 'Contact Number' }
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

      const passwordVal = passwordInput.value.trim();
      const confirmVal = password2.value.trim();

      for (let requirement of requirements) {
        if (!requirement.test(passwordVal)) {
          passwordInput.classList.add('is-invalid');
          showToast(`Password requirement not met: ${requirement.text}`);
          passwordInput.focus();
          return;
        }
      }

      if (passwordVal !== confirmVal) {
        password2.classList.add('is-invalid');
        showToast('Passwords do not match');
        password2.focus();
        return;
      }

      const terms = document.getElementById('terms');
      if (!terms.checked) {
        showToast('You must accept the terms and conditions');
        return;
      }

      form.submit();
    };
  });
</script>





