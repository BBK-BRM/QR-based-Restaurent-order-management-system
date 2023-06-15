<?php
include 'includes/url.php';
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/project-i/login.php');
}
?>

<?php require 'includes/header.php'; ?>

<?php require 'includes/footer.php'; ?>