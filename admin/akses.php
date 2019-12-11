<?php
session_start();

if(!isset($_SESSION['bukanadmin']))
    header("location:../index.php");
    $_SESSION['noback'] = "noback";
?>