<?php
include 'includes/database.php';
include 'includes/url.php';
session_start();
if (!isset($_SESSION["is_logged_in"])) {
    redirect('/project-i/login.php');
}

$conn = getDB();
$sql = "SELECT * From product";
$result = mysqli_query($conn, $sql);

?>

<?php require 'includes/header.php'; ?>
<link rel="stylesheet" href="css/style.css">
<section class="main-content">
    <section class="search">
        <div id="search">
            <input type="search" name="search_box" id="search_box" placeholder="Search-items">
        </div>

        <!-- <div id="add_product">
            <button><a href="new_product.php">New Product</a></button>
        </div> -->
    </section>

    <section id="products">
        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
            <?php if (empty($product)): ?>
                <p>No Products found.</p>
            <?php else: ?>
                
                <div class="product">
                    <div class="product_image">
                        <img src="uploads/<?= $product['image']?>" alt="food">
                    </div>

                    <div class="description">
                        <h3 class="product-name"><?= $product['name']?></h3> 
                        <p><?= $product['description']?></p> 
                        <p> R.S <?= $product['price']?></p>
                        <label for="qty">QTY</label>
                        <input type="number" name="qty" class="qty">

                        <div class="btn-container">
                            <button class="order">Order</button>
                        </div> 
                    </div>

                     
                    <!-- <div>
                        <button><a href="edit_product.php?id="></a>Edit</button>
                        <button><a href="delete_product.php?id="></a>Delete</button>
                    </div> -->
                </div>
            <?php endif; ?>
        <?php } ?>
    </section>
</section>
<script src="js/app.js"></script>

<?php require 'includes/footer.php'; ?>