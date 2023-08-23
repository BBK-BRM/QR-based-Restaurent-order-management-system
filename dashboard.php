<?php
include 'includes/url.php';
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/project-i/login.php');
}
?>

<?php require 'includes/header.php'; ?>
<link rel="stylesheet" href="css/dashbord.css">
<section class="main-content">
    <section class="dashbord">
        <div>
            <h3>Total orders</h3>
            <p>1</p>
        </div>
        <div>
            <h3>Total Sales</h3>
            <p>200</p>
        </div>
        <div>
            <h3>Total Revenue</h3>
            <p>200</p>
            </div>
        <br>
    </section>
    <img src="chart.png" alt="" class="image">
</section>
<?php require 'includes/footer.php'; ?>