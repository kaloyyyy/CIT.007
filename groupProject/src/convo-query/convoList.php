<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
$currID = $_SESSION['id'];
$chatFind = $_SESSION['tableAccount'];
$idFind = $_SESSION['idFind'];
$myCol = $_SESSION['myCol'];
$currentChat = $_POST['chatID'];
if (is_numeric($currentChat)){
    if ($_SESSION['mod']) {
        $modID = $currID;
        $userID = $currentChat;
    } else {
        $userID = $currID;
        $modID = $currentChat;
    }
    $currChatCheckQue = "select * from convo where $myCol = $currID and $idFind = $currentChat";
    $currChatCheckRes = $mysqli->query($currChatCheckQue);
    if (mysqli_num_rows($currChatCheckRes) == 0) {
        $convoInsert ="INSERT INTO komision.convo (convoID, userID, modID)
    VALUES (NULL, '$userID', '$modID');";
        $mysqli->query($convoInsert);
    }

}
$convoQue = "select * from convo where $myCol = $currID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);;

foreach ($convoRes as $convoRow) {
    $convoID = $convoRow['convoID'];

    $connectID = $convoRow[$idFind];
    $connectQue = "select * from $chatFind where $idFind = $connectID";
    $connectRes = $mysqli->query($connectQue);
    $connectRow = mysqli_fetch_assoc($connectRes);
    $connectUsername = $connectRow['username'];
    if ($connectID == $currentChat) {
        echo "<a href='/groupProject/src/user/user_index.php?chatID=$connectID'  >";
        echo "<li id='current-chat'>";
        echo $connectUsername . "</li></a>";

    } else {
        echo "<a href='/groupProject/src/user/user_index.php?chatID=$connectID'  >";
        echo "<li>";
        echo $connectUsername . "</li></a>";
    }

}