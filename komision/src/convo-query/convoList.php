<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
$currID = $_SESSION['id'];
$currentChat = $_POST['chatID'];
if (is_numeric($currentChat)){
    if ($_SESSION['mod']) {
        $modID = $currID;
        $userID = $currentChat;
    } else {
        $userID = $currID;
        $modID = $currentChat;
    }
    $currChatCheckQue = "select * from convo where userID = $currID and userID_2 = $currentChat";
    $currChatCheckRes = $mysqli->query($currChatCheckQue);
    if (mysqli_num_rows($currChatCheckRes) == 0) {
        $convoInsert ="INSERT INTO komision.convo (convoID, userID, userID_2)
    VALUES (NULL, '$userID', '$modID');";
        $mysqli->query($convoInsert);
    }
}
$convoQue = "select * from convo where userID = $currID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);;

foreach ($convoRes as $convoRow) {
    $convoID = $convoRow['convoID'];

    $connectID = $convoRow['userID_2'];
    $connectQue = "select * from users where userID = $connectID";
    $connectRes = $mysqli->query($connectQue);
    $connectRow = mysqli_fetch_assoc($connectRes);
    $connectUsername = $connectRow['username'];
    if ($connectID == $currentChat) {
        echo "<a href='/komision/src/user/index.php?chatID=$connectID'  >";
        echo "<li id='current-chat'>";
        echo $connectUsername . "</li></a>";

    } else {
        echo "<a href='/komision/src/user/index.php?chatID=$connectID'  >";
        echo "<li>";
        echo $connectUsername . "</li></a>";
    }

}