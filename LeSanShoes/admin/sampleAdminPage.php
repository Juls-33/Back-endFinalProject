<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        // Not logged in — redirect to login
        header("Location: ../users/sampleIndex.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>I am an Admin</h1>
    <a href="../userAuth/sampleLogin.php">Login</a>
    <a href="../userAuth/sampleSignup.php">Sign Up</a>
    <a href="../userAuth/logoutAdmin.php">Logout</a>
</body>
</html>