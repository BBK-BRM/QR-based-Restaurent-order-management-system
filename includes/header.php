<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-footer.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
    <script src="js/header.js"></script>
</head>

<body>
    <main>
        <header>
            <nav>
                <a href="dashboard.php">
                    <img src="images/nav_logo.png" id="logo-nav" alt="O M S">
                </a>
                <ul id="nav-links">
                    <li class="nav-item"><a href="dashboard.php" class="link"><i class="material-icons">dashboard</i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a href="product.php" class="link"><i class="material-icons">category</i><span>Product</span></a></li>
                    <li class="nav-item"><a href="order.php" class="link"><i class="material-icons">inventory</i><span>Order</span></a></li>
                </ul>
            </nav>
            <div>
                <p id="user" onclick="dropmenu()">
                <i class="material-icons">account_circle</i>
                    <?= $_SESSION['username'] ?>
                </p>
                <div id="dropdown" class="dropdown-content">
                    <a href="#" >Account</a>
                    <a href="logout.php" >logout</a>
                </div>
                <!-- <button id="logout_btn"><a href="logout.php">Logout</a></button> -->
            </div>
        </header>
