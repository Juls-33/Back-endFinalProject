<?php
    session_start();
    session_unset(); // Clear session variables
    session_destroy(); // End session
    header("Location: ../users/index.php");
    exit();
?>