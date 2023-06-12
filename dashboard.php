<?php
require 'includes/url.php';
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/php/project-i/login.php');
}
?>
<?php require 'includes/header.php'; ?>
<a href="logout.php">Logout</a>
<?php require 'includes/footer.php'; ?>