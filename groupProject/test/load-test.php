<?php
session_start();
require_once __DIR__ . "/../config/config.php";
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /groupProject/src/user/login.php");
    exit;
}

$sql = "SELECT * FROM comments LIMIT 2";
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>";
        echo "from: " . $row['author'];
        echo "<br>" . $row['message'] . "<br>";
        echo "</p>";
    }
}

$modQue = "select * from mods where modID = 1";
$modRes = mysqli_query($mysqli, $modQue);
$modRow = mysqli_fetch_assoc($modRes);
$modUsername = $modRow['modUsername'];
echo "hi " . htmlspecialchars($_SESSION["username"]) . "! say hello to " . $modUsername."<br><br>";
$modID = $modRow['modID'];

$userName = htmlspecialchars($_SESSION["username"]);
$userQue = "select * from users where userName = '$userName'";
$userRes = mysqli_query($mysqli, $userQue);
$userRow = mysqli_fetch_assoc($userRes);
$userID = $userRow['userID'];

$convoQue = "select * from convo where userID = $userID and modID = $modID";
$convoRes = mysqli_query($mysqli, $convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$convoID = $convoRow['convoID'];

$chatQue = "select * from chat where convID = $convoID";
$chatRes = mysqli_query($mysqli, $chatQue);
$chatRow = mysqli_fetch_assoc($chatRes);
if (mysqli_num_rows($chatRes) > 0) {
    foreach ($chatRes as $chatRow) {
        if($chatRow['sender'] == 0){
            echo $userName . "<br>" . $chatRow['chatMessage']."<br>";
        }else{
            echo $modUsername . "<br>" . $chatRow['chatMessage']."<br>";
        }
    }
}
echo "<br>".$testNewCount;
?>
