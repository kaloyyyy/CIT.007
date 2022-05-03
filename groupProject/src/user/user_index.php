<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

function runMyFunction() {

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
            <div class="welcome"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></div>
            <div class="flex user-button">
                <div class="btn btn-warning"><a href="reset-password.php">Reset Password</a></div>
                <div class="btn btn-danger"><a href="logout.php">Sign Out</a></div>
            </div>

            <br>
            <?php date_default_timezone_set("Asia/Manila"); ?>
        </div>
    </div>
    <div id="test">
        <div id="active"><?php $modID = $_GET['mod'];
            echo $modID ?>
        </div>
        <script>
            let testCount = 0;
            let modID = $("#active").text();
            console.log("yes");
            console.log(modID);

            //chatList.php - list all chats and messages.
            $("#test").load("chatList.php", {testNewCount: testCount, modID: modID});
            console.log("log");

        </script>
    </div>

</main>
</body>
<script>
    //script for polling then calls the chatList.php
    testCount = 1;
    (function loop() {
        setTimeout(function () {
            // Your logic here
            testCount = testCount + 1;
            console.log("log");
            $("#test").load("chatList.php", {testNewCount: testCount, modID: modID});
            loop();
        }, 1500);
    })();
</script>
</html>
