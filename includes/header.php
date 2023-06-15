<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-footer.css">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="dashboard.php">
            <img src="images/nav_logo.png" alt="O M S" width="50px" height="30px" >
        </a>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Order</a></li>
            </ul>
        </nav>
        <div>
            <span>Hi,<?= $_SESSION['username'] ?></span> 
            <a href="logout.php">Logout</a>
        </div>
    </header>

    