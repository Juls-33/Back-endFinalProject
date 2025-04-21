<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="loginstyle.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>
  <div class="background">
    <div class="description">
      <h2>Welcome Back!</h2>
      <p>Enter your email and password to open your account</p>
    </div>
  <form class="login-form">
    <label for="email">Email</label>
    <input type="email" id="email" placeholder="Enter your email" required>

    <div class="password-row">
      <label for="password">Password</label>
      <a class="options" href="newpassword.php">Forgot your Password?</a>
    </div>

  <div class="password-wrapper">
    <input type="password" id="password" placeholder="Enter your password" required>
    <span class="material-symbols-outlined toggle-password" id="togglePassword">visibility_off</span>
  </div>


    <div class="check_login">
      <div class="checkbox-row">
        <input type="checkbox" id="signed">
        <label for="signed">Keep me signed in</label>
      </div>
      <button type="submit">LOGIN</button>
    </div>

    <div class="create-account-container">
      <a href="Sign upLaraze.php" class="create-account"><i>Create an Account</i></a>
    </div>
  </form>
  </div>
</body>

<script>
  const toggle = document.getElementById('togglePassword');
  const password = document.getElementById('password');

  toggle.addEventListener('click', () => {
    const isPassword = password.type === 'password';
    password.type = isPassword ? 'text' : 'password';
    toggle.textContent = isPassword ? 'visibility' : 'visibility_off';
  });
</script>
