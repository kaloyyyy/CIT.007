<?php
session_start();
require_once __DIR__ . "/../../config/config.php";
$commPrice = $_POST['price'];
$chatMessage = $_POST['commDesc'];
$sentBy = 1;

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

$lastID = $mysqli->insert_id;

$commInsert = "insert into komision.comm ( price, chatID, created_at) 
               VALUES ($commPrice, $lastID, default)";
$mysqli->query($commInsert);

$mysqli->close();