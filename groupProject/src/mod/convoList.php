<?php
session_start();
require_once __DIR__.'/../../config/config.php';
$modID = $_SESSION['id'];
$convoQue = "select * from convo where modID = $modID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$currentUser = $_POST['chatID'];
foreach ($convoRes as $convoRow) {
    $convoID = $convoRow['convoID'];
    echo "<li>";
    $userID = $convoRow['userID'];
    $userQue = "select * from users where userID = $userID";
    $userRes = $mysqli->query($userQue);
    $userRow = mysqli_fetch_assoc($userRes);
    $username = $userRow['userName'];
        if ($userID == $currentUser) {
            echo "<a href='/groupProject/src/mod/mod_index.php?chatID=$userID' id='current-chat'>" . $username . "</a><br>";
        } else {
            echo "<a href='/groupProject/src/mod/mod_index.php?chatID=$userID'>" . $username . "</a><br>";
        }
    echo "</li>";
}
