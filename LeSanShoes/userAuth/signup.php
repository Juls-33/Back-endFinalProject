<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LeSanShoes - Sign Up</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"/>
   <!-- JQuery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" 
   crossorigin="anonymous"></script>
   <!-- Custom Scripts -->
   <script type="text/javascript" src="assets/js/display_profile_image.js"></script>
   
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
   <!-- Bootstrap JS -->
  <style>
    ul{
      padding:0;
      list-style: none;
      padding: 0%;
    }
   
    li {
      display:flex;
      vertical-align:flex-start;
      line-height: 1rem;
      font-size: 0.9rem;
      color: #000;
      margin-bottom:0.5rem;
    }

    .material-icon-checked{
      color: #008000 !important;
      font-size:1.5rem !important;
    }
    .material-icon-unchecked{
      color: #FF0000 !important;
      font-size: 1.5rem !important;
    }

    .password-requirement-text {
      margin-top:2%;
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
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center form-wrapper">
      <form id="signupForm" class="login-form w-100" style="max-width: 600px;">
        <h2 class="text-center  mb-4" style="margin-top: 1%;">Sign Up</h2>
        <hr>
        <div class="form-group">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" maxlength="100" required>
        </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email" class="form-control"  placeholder="Enter your email" maxlength="100" required>
      </div>
        <div class="row">
          <div class="form-group col-md-6 mb-3">
            <label for="fname" class="form-label">First name</label>
            <input type="text" id="fname" name="fname" class="form-control"  placeholder="Enter your firstname" maxlength="100" required>
          </div>
          <div class="form-group col-md-6 mb-3">
            <label for="lname" class="form-label">Last name</label>
            <input type="text" id="lname" name="lname" class="form-control"  placeholder="Enter your lastname" maxlength="100" required>
          </div>
        </div>

      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <div class="password-wrapper">
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" maxlength="100" required>
        </div>
      <div>
      <div class="form-group">
        <label for="passwordConf" class="form-label">Confirm Password</label>
        <div class="password-wrapper">
          <input type="password" id="passwordConf" name="passwordConf" class="form-control" placeholder="Re-enter your password" maxlength="100" required>
      </div>

      <div class="form-group">
        <label for="birthdate" class="form-label">Birthday</label>
        <input type="date" id="birthdate" name="birthdate" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" maxlength="250" required>
      </div>

      <div class="form-group">
        <label for="contact" class="form-label">Contact Number</label>
        <input type="number" id="contact" name="contact" class="form-control" placeholder="Enter your contact number" min="0" onKeyPress="if(this.value.length==11) return false;" required>
      </div>

      <div class="checkbox">
        <input type="checkbox" class="form-check-input" id="terms" required>
        <label class="form-check-label" for="terms">
          I agree to the <a href="#" class="condition-link" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
        </label>
      </div>

      <!-- Terms Modal -->
      <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="termsContent">
              Loading...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="checkbox">
        <input type="checkbox" class="form-check-input" id="privacy" required>
        <label class="form-check-label" for="privacy">
          I agree to the <a href="#" class="condition-link" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
        </label> 
      </div>

      <!-- Privacy Modal -->
      <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="privacyContent">
              Loading...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="d-grid">
        <button type="button" class="btn btn-danger" onclick="signUp()">Sign Up</button>
      </div>

      <p class="text-center mt-3">Already have an account? <a href="login.php">Log in</a></p>
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
  </div>
  <!-- Toast for Confirmation -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1099">
    <div id="confirmationToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="toastConfirmationMessage">
          <!-- Success message will appear here -->
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
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
</body>
</html>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    // Elements
    const errorElement = document.getElementById('errorToast');
    const confirmationElement = document.getElementById('confirmationToast');
    const form = document.getElementById('signupForm');
    const passwordInput = document.getElementById('password');
    const password2 = document.getElementById('passwordConf');
    const termsCheckbox = document.getElementById('terms');
    const privacyCheckbox = document.getElementById('privacy');

    // Password requirements
    const requirements = [
        { test: (val) => val.length >= 10, text: 'At least 10 characters' },
        { test: (val) => /[A-Z]/.test(val), text: 'One uppercase letter' },
        { test: (val) => /[a-z]/.test(val), text: 'One lowercase letter' },
        { test: (val) => /\d/.test(val), text: 'One number' },
        { test: (val) => /[^A-Za-z0-9]/.test(val), text: 'One special character' }
    ];

    // Password validation popover setup
    if (passwordInput) {
        new bootstrap.Popover(passwordInput, {
            content: getUpdatedContent(passwordInput.value),
            trigger: 'focus',
            html: true
        });

        passwordInput.addEventListener('input', function() {
            const popover = bootstrap.Popover.getInstance(passwordInput);
            if (popover) {
                popover.setContent({ '.popover-body': getUpdatedContent(this.value) });
            }
        });
    }

    // Helper function for password requirements display
    function getUpdatedContent(value) {
        return `<ul style="margin:0; padding-left: 0.5rem;">` +
            requirements.map(req => {
                const icon = req.test(value)
                    ? '<span class="material-symbols-outlined material-icon-checked">check_circle</span>'
                    : '<span class="material-symbols-outlined material-icon-unchecked">radio_button_unchecked</span>';
                return `<li style="margin-bottom: 0.5rem;">${icon} <span class="password-requirement-text">${req.text}</span></li>`;
            }).join('') + `</ul>`;
    }

    // Toast notification function
   function showToast(message, type = 'error') {
      if (type === 'confirmation') {
        document.getElementById('toastConfirmationMessage').textContent = message;
        new bootstrap.Toast(document.getElementById('confirmationToast')).show();
      } else {
        document.getElementById('toastErrorMessage').textContent = message;
        new bootstrap.Toast(document.getElementById('errorToast')).show();
      }
    }

    // Main form submission function
    window.signUp = function () {
        // Clear previous errors
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        // Check required fields
        const requiredFields = [
            { id: 'username', name: 'Username' },
            { id: 'fname', name: 'First name' },
            { id: 'lname', name: 'Last name' },
            { id: 'email', name: 'Email' },
            { id: 'password', name: 'Password' },
            { id: 'passwordConf', name: 'Password confirmation' },
            { id: 'birthdate', name: 'Birthdate' },
            { id: 'address', name: 'Address' },
            { id: 'contact', name: 'Contact number' }
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

        // Password validation
        const passwordVal = passwordInput.value.trim();
        const confirmVal = password2.value.trim();

        // Check password requirements
        for (let requirement of requirements) {
            if (!requirement.test(passwordVal)) {
                passwordInput.classList.add('is-invalid');
                showToast('Password does not meet all requirements');
                return;
            }
        }

        // Check password match
        if (passwordVal !== confirmVal) {
            password2.classList.add('is-invalid');
            showToast('Passwords do not match');
            return;
        }

        // Check terms and privacy
        if (!termsCheckbox.checked || !privacyCheckbox.checked) {
            showToast('You must accept both the terms and conditions and privacy policy');
            return;
        }

        // If all validations pass
        // EDIT
        // EDITTTTTTTTTTT
            var form = document.getElementById('signupForm');
            if (!form.checkValidity()) {
                form.reportValidity(); 
                return; 
              }
              console.log('checkpoint 1');
            var formData = new FormData(form);
            var data = {
                action: 'signUp',
                username: formData.get("username").trim(),
                user_fname: formData.get("fname").trim(),
                user_lname: formData.get("lname").trim(),
                user_email: formData.get("email").trim(),
                user_password: formData.get("password").trim(),
                user_passwordConf: formData.get("passwordConf").trim(),
                user_birthday: formData.get("birthdate").trim(),
                user_address: formData.get("address").trim(),
                user_contact: formData.get("contact").trim(),
            };
            console.log(data);
            var jsonString = JSON.stringify(data);
            $.ajax({
              url: "../includes/logic/userAuthToDB.php", 
              type: "POST",
              data: {myJson : jsonString},
              success: function(response) {
                      showToast('Account created successfully!', 'confirmation');
                        setTimeout(() => form.submit(), 1000);
              },
              error: function() {
                  // Handle any errors that occur during the request
                  showToast('Username already exist');
              }
          });
// END OF EDITTT
        
        // setTimeout(() => form.submit(), 2000);
    };
});

  //Modal
 document.addEventListener('DOMContentLoaded', function () {
  // Terms Modal
  const termsModal = document.getElementById('termsModal');
  termsModal.addEventListener('show.bs.modal', function () {
    loadModalContent('./termsandconditions.html', 'termsContent');
  });

  // Privacy Modal
  const privacyModal = document.getElementById('privacyModal');
  privacyModal.addEventListener('show.bs.modal', function () {
    loadModalContent('./privacy.html', 'privacyContent');
  });

  // Shared function to load content
  function loadModalContent(url, elementId) {
    const contentElement = document.getElementById(elementId);
    contentElement.innerHTML = "Loading...";
    
    fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
      })
      .then(data => {
        contentElement.innerHTML = data;
      })
      .catch(error => {
        contentElement.innerHTML = `Failed to load content. (${error.message})`;
        console.error(`Error loading ${url}:`, error);
      });
  }
});
</script>
<script src="../includes/logic/signupMiddleware.js"></script>

