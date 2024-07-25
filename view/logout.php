<?php
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    header('location: login.php');
?>
