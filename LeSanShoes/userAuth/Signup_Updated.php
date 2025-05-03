<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="Signup_Updated.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
  <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center my-login-page">
      <form class="login-form">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" class="form-control" placeholder="Enter your username" maxlength="100"  />
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" id="firstname" class="form-control" placeholder="Enter your firstname" maxlength="100"  />
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" id="lastname" class="form-control" placeholder="Enter your lastname" maxlength="100"  />
          </div>
        </div>

        <div class="mb-3">
          <label for="userEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="userEmail" placeholder="Enter your email address" maxlength="100"  />
        </div>

        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <div class="password-wrapper position-relative">
            <input type="password" class="form-control" id="password" placeholder="Enter your password" maxlength="100"
              data-bs-toggle="popover" data-bs-trigger="focus" data-bs-html="true" title="Password must:"  />
              <span class="material-symbols-outlined toggle-password" id="togglePassword1"> visibility_off</span>
          </div>
        </div>

        <div class="mb-3 position-relative">
          <label for="re_password" class="form-label">Re-enter your Password</label>
          <div class="password-wrapper">
            <input type="password" class="form-control" id="re_password" placeholder="Re-enter your password" maxlength="100"  />
            <span class="material-symbols-outlined toggle-password" id="togglePassword2">visibility_off</span>
          </div>
        </div>

        <div class="mb-3">
          <label for="birthdate" class="form-label">Birthday</label>
          <input type="date" id="birthdate" class="form-control" maxlength="100"  />
        </div>

        <div class="mb-3">
          <label for="curr_address" class="form-label">Current Address</label>
          <input type="text" id="curr_address" class="form-control" placeholder="Enter your current address" maxlength="100"  />
        </div>

        <div class="mb-3">
          <label for="perma_label" class="form-label" id="perma_label">Permanent Address</label>
          <input type="text" id="perma_address" class="form-control" placeholder="Enter your permanent address" maxlength="100"  />
        </div>

        <div class="mb-3">
          <label for="number" class="form-label">Contact Number</label>
          <input type="tel" id="number" class="form-control" placeholder="Enter your contact number" maxlength="100"  />
        </div>

        <div class="form-check mb-4" style="margin-top: 1%;">
          <input type="checkbox" class="form-check-input" id="terms_conditions"/>
          <label class="form-check-label" for="terms_conditions">
            I agree to the <a href="#" class="condition-link">terms and conditions</a> of this website
          </label>
        </div>

        <div class="button-container">
          <button type="submit" class="btn btn-dark login-btn">Login</button>
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
</div>
</body>
</html>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Enable Bootstrap popovers
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverTriggerList.forEach(el => {
      new bootstrap.Popover(el);
    });

    const passwordInput = document.getElementById('password');

    const requirements = [
      { test: (val) => val.length >= 10, text: 'At least 10 Characters' },
      { test: (val) => /[A-Z]/.test(val), text: 'One Uppercase letter' },
      { test: (val) => /[a-z]/.test(val), text: 'One lowercase letter' },
      { test: (val) => /\d/.test(val), text: 'One number' },
      { test: (val) => /[^A-Za-z0-9]/.test(val), text: 'One special character' },
    ];

    const getUpdatedContent = (value) => {
      const items = requirements.map(req => {
        const passed = req.test(value);
        const icon = passed
          ? '<span class="material-symbols-outlined" style="color: green; vertical-align: middle;">done</span>'
          : '<span class="material-symbols-outlined" style="color: gray; vertical-align: middle;">radio_button_unchecked</span>';
        return `<li style="margin-bottom: 0.5rem;">${icon} ${req.text}</li>`;
      });
      return `<ul style="margin:0; padding-left: 1rem;">${items.join('')}</ul>`;
    };

    const popover = new bootstrap.Popover(passwordInput, {
      html: true,
      trigger: 'focus',
      title: 'Password must:',
      content: getUpdatedContent(''), // Initial content
    });

    passwordInput.addEventListener('input', function () {
      const content = getUpdatedContent(passwordInput.value);
      popover.setContent({
        '.popover-body': content
      });
    });

    // Toggle password 1 visibility
    const toggle1 = document.getElementById('togglePassword1');
    if (toggle1 && passwordInput) {
      toggle1.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        toggle1.textContent = isPassword ? 'visibility' : 'visibility_off';
      });
    }

    // Toggle password 2 visibility
    const toggle2 = document.getElementById('togglePassword2');
    const password2 = document.getElementById('re_password');
    if (toggle2 && password2) {
      toggle2.addEventListener('click', () => {
        const isPassword = password2.type === 'password';
        password2.type = isPassword ? 'text' : 'password';
        toggle2.textContent = isPassword ? 'visibility' : 'visibility_off';
      });
    }

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
        { id: 'username', name: 'Username' },
        { id: 'firstname', name: 'Firstname' },
        { id: 'lastname', name: 'Lastname' },
        { id: 'userEmail', name: 'Email' },
        { id: 'password', name: 'Password' },
        { id: 're_password', name: 'Re-entered Password' },
        { id: 'birthdate', name: 'Birthday' },
        { id: 'curr_address', name: 'Current Address' },
        { id: 'perma_address', name: 'Permanent Address' },
        { id: 'number', name: 'Contact Number' }
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

      const password = document.getElementById('password');
      const rePassword = document.getElementById('re_password');
      const passwordVal = password.value.trim();

      const requirements = [
      { test: (val) => val.length >= 10, text: 'At least 10 Characters' },
      { test: (val) => /[A-Z]/.test(val), text: 'One Uppercase letter' },
      { test: (val) => /[a-z]/.test(val), text: 'One lowercase letter' },
      { test: (val) => /\d/.test(val), text: 'One number' },
      { test: (val) => /[^A-Za-z0-9]/.test(val), text: 'One special character' },
      ];

      for (let requirement of requirements){
        if(!requirement.test(passwordVal)){
          password.classList.add('is-invalid');
          showToast(`Password requirement not met: ${requirement.text}`);
          password.focus();
          return;
        }
      }

      if (password.value.trim() !== rePassword.value.trim()) {
        rePassword.classList.add('is-invalid');
        showToast('Passwords do not match');
        rePassword.focus();
        return;
      }

      const termsChecked = document.getElementById('terms_conditions').checked;
      if (!termsChecked) {
        showToast('You must accept the terms and conditions');
        return;
      }

      form.submit();
    });
  });
</script>

