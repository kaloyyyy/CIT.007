<?php
// Include config file
require_once __DIR__ . "/../../config/config.php";
require __DIR__ . '/../convo-query/user-query.php';
require __DIR__ . '/../convo-query/mod-query.php';
$convoQue = "select * from convo where userID = $userID and modID = $modID";
$convoRes = mysqli_query($mysqli, $convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);
$convoID = $convoRow['convoID'];
