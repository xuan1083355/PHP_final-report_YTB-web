<?php
    session_start();
    unset($_SESSION['uName']);
    header('location:home.php');
?>