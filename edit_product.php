<?php
session_start();
if(!isset($_SESSION["is_logged_in"])){
    redirect('/project-i/login.php');
}

require 'includes/database.php';
require 'includes/url.php';

if(isset($_GET['id'])){
    $conn = getDB();
    $id = $_GET['id'];
    $sql = "SELECT * From product where id=$id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if($product){
        $product_name = $product['name'];
        $product_description = $product['description'];
        $product_price = $product['price'];
        $product_category = $product['category'];
        $product_image = $product['image'];
    }
    else{
        die('Product not found');
    }
}else{
    die('Id not supplied,Product not found.');
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['save_product'])){
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_image = $_POST['product_image'];

    if(empty($errors)){
        $sql="UPDATE articles SET name=?,price=?,description=?,category=?,image=? WHERE id=?";
        $stmt=mysqli_prepare($conn,$sql);

        if($stmt===false){
        echo mysqli_error($conn);
        }else{
            mysqli_stmt_bind_param($stmt, "sisssi", $product_name, $product_price, $product_description,$product_category,$product_image,$id);
            if(mysqli_stmt_execute($stmt)){
                redirect("/project-i/product.php");
            }
            else{
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>
<?php require 'includes/header.php'; ?>
<link rel="stylesheet" href="css/new_product.css">
<section class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <h3>Edit Product</h3>
        <div>
            <label for="product name">Name</label>
            <input type="text" name="product_name" id="product_name" placeholder="Product Name"
                value="<?= htmlspecialchars($product_name); ?>" required>
        </div>
        <div>
            <label for="product description">Description</label>
            <input name="product_description" id="product_description" cols="40" rows="4"
                placeholder="Product Description" value="<?= htmlspecialchars($product_description); ?>"
                required></textarea>
        </div>
        <div>
            <label for="product price">Price</label>
            <input type="number" name="product_price" id="product_price" placeholder="Product Price"
                value="<?= htmlspecialchars($product_price); ?>" required>
        </div>
        <div>
            <label for="product image">Image</label>
            <input type="file" name="product_image" id="product_image" value="" required>
        </div>
        <div>
            <label for="product category">category</label>
            <select name="category" id="category">
                <option value="">Choose Category</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="Breverages">Breverages</option>
                <option value="dinner">Dinner</option>
            </select>
        </div>
        <div id="btn-container">
            <button name="save_product" class="btn add">Save</button>
            <button class="btn cancel"><a href="product.php">cancel</a></button>
        </div>
    </form>
</section>
<?php require 'includes/footer.php'; ?>