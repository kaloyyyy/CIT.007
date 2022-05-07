<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
$currID = $_SESSION['id'];
$chatFind = $_SESSION['tableAccount'];
$idFind = $_SESSION['idFind'];

$convoQue = "select * from convo where userID = $currID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);;

$currentChat = $_POST['chatID'];
foreach ($convoRes as $convoRow) {
    $convoID = $convoRow['convoID'];
    echo "<li>";
    $connectID = $convoRow['modID'];
    $connectQue = "select * from $chatFind where $idFind = $connectID";
    $connectRes = $mysqli->query($connectQue);
    $connectRow = mysqli_fetch_assoc($connectRes);
    $connectUsername = $connectRow['username'];
    if ($connectID == $currentChat) {
        echo "<a href='/groupProject/src/user/user_index.php?chatID=$connectID' id='current-chat'>" . $connectUsername . "</a><br>";
    } else {
        echo "<a href='/groupProject/src/user/user_index.php?chatID=$connectID'>" . $connectUsername . "</a><br>";
    }
    echo "</li>";
}
