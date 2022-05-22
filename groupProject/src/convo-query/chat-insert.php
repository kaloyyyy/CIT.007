<?php
require_once __DIR__ . "/../../config/config.php";
$chatMessage = $_POST['chat'];
session_start();
if($_SESSION['mod']){
    $sentBy = 1;
}else{
    $sentBy = 0;
}
$currID = $_SESSION['id'];
$theirCol = $_SESSION['idFind'];
$myCol = $_SESSION['myCol'];
$theirID = $_POST['chatID'];
$convoQue = "select * from convo where $myCol = $currID and $theirCol = $theirID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$convoID = $convoRow['convoID'];

$chatInsert = "INSERT INTO komision.chat (created_at, sender, message, convID)
VALUES (DEFAULT, $sentBy, '$chatMessage', '$convoID');";
$mysqli->query($chatInsert);