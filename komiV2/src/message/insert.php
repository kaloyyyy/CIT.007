<?php
require_once __DIR__ . "/../../config/config.php";
$chatMessage = $_POST['chat'];
session_start();
$chat = $_POST['chat'];
$convoID = $_POST['chatID'];
$sentBy = $_SESSION['userType'];
$chatInsert = "INSERT INTO chat (created_at, sender, message, convID)
VALUES (DEFAULT, $sentBy, '$chatMessage', '$convoID');";
$mysqli->query($chatInsert);