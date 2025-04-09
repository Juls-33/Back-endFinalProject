<?php
// Start the session
session_start();
// if (!isset($_SESSION['username'])) {
//     // Not logged in — redirect to login
//     header("Location: sampleLogin.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UserAccounts - Home</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- Custome styles -->
        <link rel="stylesheet" href="static/css/style.css">
        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div><a href="sampleLogin.php">Login</a></div>
        <p>Username: <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?></p>
        <a href="../logoutUser.php">Logout</a>
    </body>
</html>