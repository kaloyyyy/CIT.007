<?php
$chatMessage = $_POST['chat'];
session_start();
if($_SESSION['mod']==true){
    $userID = $_POST['userID'];
    require __DIR__ . '/../convo-query/mod-query.php';
    $sentBy = 1;
}else{
    $modID = $_POST['modID'];
    require __DIR__ . '/../convo-query/user-query.php';
    $sentBy = 0;
}

$convoQue = "select * from convo where userID = $userID and modID = $modID";
$convoRes = mysqli_query($mysqli, $convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$convoID = $convoRow['convoID'];

$chatInsert = "INSERT INTO komision.chat (created_at, sender, chatMessage, convID)
VALUES (DEFAULT, $sentBy, '$chatMessage', '$convoID');";
$mysqli->query($chatInsert);