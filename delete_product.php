<?php
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/project-i/login.php');
}

require 'includes/database.php';
require 'includes/url.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    die('Id not supplied,product not found.');
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['delete'])){
    $sql="DELETE FROM articles WHERE id=?";
    $stmt=mysqli_prepare($conn,$sql);

    if($stmt===false){
        echo mysqli_error($conn);
    }else{
        mysqli_stmt_bind_param($stmt,"i",$id);
        if(mysqli_stmt_execute($stmt)){
            redirect("/project-i/product.php");
        }
        else{
            echo mysqli_stmt_error($stmt);
        }
    }
}

if(isset($_POST['cancel'])){
    redirect("/project-i/product.php");
}

?>
<?php require 'includes/header.php';?>
<link rel="stylesheet" href="css/delete_product.css">
<section class="delete-section">
    <h2>Delete article</h2>
    <form method="post">
        <p>Are you sure?</p>
        <div class="btn-container">
            <button name="delete" class="btn delete">Delete</button>
            <button name="cancel"class="btn cancel">Cancel</button>
        </div>
    </form>
    <?php require 'includes/footer.php';?>
</section>