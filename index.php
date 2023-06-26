<?php
include 'includes/url.php';
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/project-i/login.php');
}
?>

<?php require 'includes/header.php'; ?>
<main>
    <section>
        <div id="search">
            <input type="search" name="search_box" id="search_box">
        </div>
    
        <div id="add_product">
            <button><a href="new_product.php">New Product</a></button>
        </div>
    </section>

    <section id="products">
        <div class="product">
            <div class="product_image">
                <img src="?" alt="?">
            </div>

            <div class="discription">
                name
                decscription
                price
                qty
            </div>
            <div>
                <button><a href="edit_product.php?id="></a>Edit</button>
                <button><a href="delete_product.php?id="></a>Delete</button>
            </div>
        </div>
    </section>

</main>


<?php require 'includes/footer.php'; ?>