<?php 
ob_start();
session_start();
include 'admin/inc/config.php';
unset($_SESSION['member']);
header("location: ".BASE_URL.'login.php'); 
?>