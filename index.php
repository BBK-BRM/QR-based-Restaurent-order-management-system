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

if(isset($_POST['order'])){
    
    //add id
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['qty'];
    // $user_id = $_SESSION['user_id'];
    $total_price = $price * $quantity;
    // selects form ordered check if in order table product id is equal to order product id then update increase qty, else insert new item, 
    $sql = "INSERT INTO ordered(name,qty,price,total_price) VALUES ('$name',$quantity,$price,$total_price)";
    mysqli_query($conn, $sql);
}
?>

<?php //require 'includes/header.php'; ?>

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
    <div class="container">
    <section id="products">
        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
            <?php if (empty($product)): ?>
                <p>No Products found.</p>
            <?php else: ?>
            <form method="post">     
                <div class="product">
                    <div class="product_image">
                        <img src="uploads/<?= $product['image']?>" alt="food">
                    </div>

                    <div class="description">
                        <h3 class="product-name"><?= $product['name']?></h3> 
                        <p><?= $product['description']?></p> 
                        <p> R.S <?= $product['price']?></p>
                        <label for="qty">QTY</label>
                        <input type="number" name="qty" class="qty" value="1">
                        <input type="hidden" name="name" value="<?= $product['name']?>">
                        <input type="hidden" name="price" value="<?= $product['price']?>">
                        <input type="hidden" name="id" value="<?= $product['id']?>">
                        
                        <div class="btn-container">
                            <button class="order" name="order" value="ordered">Order</button>
                        </div> 
                    </div>
                </form>
                     
                    <!-- <div>
                        <button><a href="edit_product.php?id="></a>Edit</button>
                        <button><a href="delete_product.php?id="></a>Delete</button>
                    </div> -->
                </div>
            <?php endif; ?>
        <?php } ?>
    </section>

    <section id="billing">
        <?php
            $conn = getDB();
            $sql = "SELECT * From ordered";
            $result = mysqli_query($conn, $sql);
        ?>
        <table class="product">
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
</div>
</section>
<script src="js/app.js"></script>
<?php require 'includes/footer.php'; ?>