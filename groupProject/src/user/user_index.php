<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../../config/meta.php'; ?>
    <meta charset="UTF-8">
    <title>Komi-sion</title>
</head>
<body>
<?php include_once __DIR__ . '/../../public/header.php' ?>
<main>
    <div class="flex">
        <div class="wrapper">
            <div class = "welcome"><h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1></div>
            <div class = "btn btn-warning"><a href="reset-password.php">Reset Password</a></div>
            <div class="btn btn-danger"><a href="logout.php">Sign Out</a></div><br>
            <?php date_default_timezone_set("Asia/Manila");echo date("l jS \of F Y h:i:s A");?>
        </div>
    </div>
</main>
</body>
</html>
