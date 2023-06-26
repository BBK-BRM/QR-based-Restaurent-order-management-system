<?php
include 'includes/url.php';
include 'includes/database.php';

session_start();
if (!isset($_SESSION["is_logged_in"])) {
    redirect('/project-i/login.php');
}

$conn = getDB();
$sql = "SELECT * From product";
$result = mysqli_query($conn, $sql);

?>

<?php require 'includes/header.php'; ?>
<link rel="stylesheet" href="css/product.css">
<section class="main-content">
    <section id="search-add">
        <div id="search">
            <input type="search" name="search_box" id="search_box" placeholder="search Items">
        </div>
        <div>
            <a href="new_product.php"><button id="add_product">New Product</button></a>
        </div>
    </section>

    <section id="products">
        <table class="product">
            <thead>
                <th>S.N</th>
                <th>PRODUCT IMAGE</th>
                <th>PRODUCT DESCRIPTION</th>
                <th>OPERATION</th>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php while ($product = mysqli_fetch_assoc($result)) { ?>
                    <?php if (empty($product)): ?>
                        <p>No Products found.</p>
                    <?php else: ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>

                            <td class="product_image">
                                <img src="images/<?= $product['image']; ?>" alt="image">
                            </td>

                            <td class="discription">
                                <p id="product_name">
                                    <?= $product['name'] ?>
                                </p>
                                <p id="product_description">
                                    <?= $product['description'] ?>
                                </p>
                                <p id="Product_price">RS.
                                    <?= $product['price'] ?>
                                </p>
                            </td>

                            <td>
                                <a href="edit_product.php?id=<?= $product['id'] ?>"><button class="btn edit">Edit</button></a>
                                <a href="delete_product.php?id=<?= $product['id'] ?>"><button class="btn delete">Delete</button></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php } ?>
            </tbody>
        </table>
    </section>
</section>
<script src="js/product.js"></script>

<?php require 'includes/footer.php'; ?>