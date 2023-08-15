<?php
include 'includes/url.php';
include 'includes/database.php';
session_start();
if (!isset($_SESSION["is_logged_in"])) {
    redirect('/project-i/login.php');
}
$product_name = '';
$product_description = '';
$product_price = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_product'])) {
    $conn = getDB();
    
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    $product_image = $_FILES['product_image']['name'];
    $tempname = $_FILES["product_image"]["tmp_name"];  
    $folder ="uploads/".basename($product_image);
    
    $product_category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO product(name,price,description,category,image) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "sisss", $product_name, $product_price, $product_description,$product_category,$product_image);

        if (mysqli_stmt_execute($stmt)) {
            if(move_uploaded_file($tempname,$folder)){
                redirect("/project-i/product.php");
            }
            else{
                echo "Unable to upload.";
            }
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>

<?php require 'includes/header.php'; ?>
<link rel="stylesheet" href="css/new_product.css">
<section class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <h3>New Product</h3>
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
            <button name="add_product" class="btn add">Add Product</button>
            <button class="btn cancel"><a href="product.php">cancel</a></button>
        </div>
    </form>
</section>

<?php require 'includes/footer.php'; ?>