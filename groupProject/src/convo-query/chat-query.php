<?php
session_start();
$convoID = require __DIR__.'/../convo-query/convo-query.php';
$modRow = require __DIR__.'/../convo-query/mod-query.php';
$userRow = require __DIR__.'/../convo-query/user-query.php';
$userName = $userRow['userName'];
$modUsername = $modRow['modUsername'];
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