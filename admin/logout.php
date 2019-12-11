<?php
session_start();

session_destroy();
//logout
header("location:../index.php");
?>