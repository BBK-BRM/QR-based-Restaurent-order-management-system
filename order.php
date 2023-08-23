<?php
include 'includes/url.php';
include 'includes/database.php';
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/project-i/login.php');
}

$conn = getDB();
$sql = "SELECT * From ordered";
$result = mysqli_query($conn, $sql);
?>

<?php require 'includes/header.php'; ?>
<style>
    #products{
        margin: 0 auto;
    }
    .product{
        border-spacing: 0;
        width: 60vw;
    }
    .product td,.product th{
        padding: 0.3rem;
    }
</style>
<section id="products">
        <table class="product" border='1px'>
            <thead>
                <th>S.N</th>
                <th>PRODUCT NAME</th>
                <th>PRODUCT PRICE</th>
                <th>QTY</th>
                <th>TOTAL PRICE</th>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php while ($product = mysqli_fetch_assoc($result)) {?>
                    <?php if (empty($product)): ?>
                        <p>No Products found.</p>
                    <?php else: ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td>
                                <?= $product['name'] ?>
                            </td>
                            <td>
                                <?= $product['price'] ?>
                            </td>
                            <td>
                                <?= $product['qty'] ?>
                            </td>
                            <td>
                                <?= $product['total_price'] ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php } ?>
            </tbody>
        </table>
    </section>
<?php require 'includes/footer.php'; ?>