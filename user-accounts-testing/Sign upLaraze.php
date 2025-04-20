<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
    <link rel="stylesheet" href="signupstyle.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body>
    <div class="background">
        <form class="login-form">
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Enter your username" required>

            <div class="fullname">
                <div class="field">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" placeholder="Enter your firstname" required>
                </div>
                <div class="field">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" placeholder="Enter your lastname" required>
                </div>
            </div>

            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="password">Enter your Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" placeholder="Enter your password" required>
                <span class="material-symbols-outlined toggle-password" id="togglePassword1">visibility_off</span>
            </div>
           
            <label for="re_password">Re-enter your Password</label>
            <div class="password-wrapper">
                <input type="password" id="re_password" placeholder="Re-enter your password" required>
                <span class="material-symbols-outlined toggle-password" id="togglePassword2">visibility_off</span>
            </div>
            
            <label for="birthdate">Birthday</label>
            <input type="date" id="birthdate" required>

            <label for="curr_address">Current Address</label>
            <input type="text" id="curr_address" placeholder="Enter your current address" required>

            <label for="perma_address" id="perma_label">Permanent Address</label>
            <input type="text" id="perma_address" placeholder="Enter your permanent address" required>

            <div class="checkbox-address">
                <input type="checkbox" id="same-address" />
                <label for="same-address">Same as current address</label>
            </div>


            <label for="number">Contact Number</label>
            <input type="tel" id="number" placeholder="Enter your contact number" required>
            
            <div class="checkbox-row">
                <input type="checkbox" id="terms_conditions" />
             <label for="terms_conditions">I agree to the <a href="#" class="condition-link">terms and conditions</a> of this website</label>
            </div>

            <div class="button-container">
                <button type="submit">SIGN UP</button>
            </div>
        </form>
    </div>

</form>
</body>
</html>

<script>
  const toggle1 = document.getElementById('togglePassword1');
  const password1 = document.getElementById('password');

  toggle1.addEventListener('click', () => {
    const isPassword = password1.type === 'password';
    password1.type = isPassword ? 'text' : 'password';
    toggle1.textContent = isPassword ? 'visibility' : 'visibility_off';
  });

  const toggle2 = document.getElementById('togglePassword2');
  const password2 = document.getElementById('re_password');

  toggle2.addEventListener('click', () => {
    const isPassword = password2.type === 'password';
    password2.type = isPassword ? 'text' : 'password';
    toggle2.textContent = isPassword ? 'visibility' : 'visibility_off';
  });

  const checkbox = document.getElementById('same-address');
  const currAddress = document.getElementById('curr_address');
  const permaAddress = document.getElementById('perma_address');
  const permaLabel = document.getElementById('perma_label');

  checkbox.addEventListener('change', () => {
    if (checkbox.checked) {
        permaAddress.value = currAddress.value; // Copy current address
        permaAddress.style.display = 'none'; // Hide input
        permaLabel.style.display = 'none';   // Hide label
    } else {
        permaAddress.style.display = 'block';
        permaLabel.style.display = 'block';
        permaAddress.value = ''; // Optional: clear it
    }
  });
</script>

