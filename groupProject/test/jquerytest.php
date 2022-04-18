<?php
session_start();
require_once __DIR__ . "/../config/config.php";
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /groupProject/src/user/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../config/meta.php'; ?>
    <meta charset="UTF-8">
    <title>test</title>
    <script>
        $(document).ready(function () {
            var testCount = 2;
            $("button").click(function () {
                testCount += 2;
                $("#test").load("load-test.php", {
                    testNewCount: testCount
                });
            });
        }); 
    </script>
</head>
<body>
<?php include __DIR__ . '/../public/header.php'; ?>
<div id="test">
    <?php

    $sql = "SELECT * FROM comments LIMIT 2";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo "<p>";
            echo $row['author'];
            echo "<br>".$row['message']."<br>";
            echo "</p>";
        }
    }

    ?>

</div>
<button>yes</button>
<main>
</main>
</body>
</html>