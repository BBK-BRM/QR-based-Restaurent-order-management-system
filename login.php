<?php
require 'includes/url.php';
require 'includes/database.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = getDB();
    
    $sql_user_check = 'SELECT * FROM users WHERE username=? OR email=? ';
    $stmt = mysqli_prepare($conn, $sql_user_check);
    if ($stmt == false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'ss',$username,$username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            $pass_check = password_verify($password, $user['password']);
            if ($pass_check) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                redirect('/project-i/dashboard.php');
            } else {
                $error = 'Username or password doesn\'t match';
            }
        } else {
            // echo mysqli_error($conn);
        }
    }
}
?>

<?php require 'includes/header.php'; ?>
<?php echo '<link href="css/login.css" rel="stylesheet" />'; ?>

<div class="login-desc">
    <h1>Order Management system</h1>
</div>
<div class="login-form">
    <h2>Login</h2>
    <form method="post">

        <?php if (!empty($error)): ?>
            <p>
                <?= $error ?>
            </p>
        <?php endif; ?>

        <label for="username">Username/Email</label>
        <input type="text" name="username" id="username" placeholder="Username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>

        <button name="login">Login</button>
    </form>
    <p>Don't have an account?<a href="signup.php">Sign Up.</a></p>
</div>

<?php require 'includes/footer.php'; ?>