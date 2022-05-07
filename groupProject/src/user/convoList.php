<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
$currID = $_SESSION['id'];
$convoQue = "select * from convo where userID = $currID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$currentChat = $_POST['chatID'];
foreach ($convoRes as $convoRow) {
    $convoID = $convoRow['convoID'];
    echo "<li>";
    $modID = $convoRow['modID'];
    $modQue = "select * from mods where modID = $modID";
    $modRes = $mysqli->query($modQue);
    $modRow = mysqli_fetch_assoc($modRes);
    $modUsername = $modRow['modUsername'];
    if ($modID == $currentChat) {
        echo "<a href='/groupProject/src/user/user_index.php?chatID=$modID' id='current-chat'>" . $modUsername . "</a><br>";
    } else {
        echo "<a href='/groupProject/src/user/user_index.php?chatID=$modID'>" . $modUsername . "</a><br>";
    }
    echo "</li>";
}
