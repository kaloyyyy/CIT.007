<?php
$chatMessage = $_POST['chat'];
$modID = $_POST['modID'];
echo $chatMessage;
session_start();

require __DIR__ . '/../convo-query/user-query.php';
$convoQue = "select * from convo where userID = $userID and modID = $modID";
$convoRes = mysqli_query($mysqli, $convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$convoID = $convoRow['convoID'];

$chatInsert = "INSERT INTO komision.chat (created_at, sender, chatMessage, convID)
VALUES (DEFAULT, 0, '$chatMessage', '$convoID');";
$mysqli->query($chatInsert);