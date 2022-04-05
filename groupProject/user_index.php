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
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Komi-sion</title>
</head>
<body>
<?php include 'header.php';?>
<main>

    <div class = "welcome"><h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1></div>
    <div class = "btn btn-warning"><a href="reset-password.php">Reset Password</a></div>
    <div class="btn btn-danger"><a href="logout.php">Sign Out</a></div>
</main>
</body>
</html>
