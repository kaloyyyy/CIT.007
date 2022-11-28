<?php
// Initialize the session
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/lib.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location:/src/users/login.php");
    exit;
}
?>

<div class="d-flex w-100 justify-content-center col-6">
    <div class="">


        <div class="container-fluid">
            <h1 class="">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome to SODA</h1>
            <p>
                <a href="/src/users/reset-password.php" class="btn btn-warning">Reset Your Password</a>
            </p>

        </div>
        <div class="container-fluid">

        </div>
    </div>


</div>


