<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';

$currID = $_SESSION['id'];
$currentChat = $_POST['chatID'];
$accType = $_SESSION['accType'];

if (is_numeric($currentChat)) {
    if ($_SESSION['mod']) {
        $modID = $currID;
        $userID = $currentChat;
    } else {
        $userID = $currID;
        $modID = $currentChat;
    }
    $currChatCheckQue = "select * from convo where userID = $currID and fl_userID = $currentChat";
    $currChatCheckRes = $mysqli->query($currChatCheckQue);
    if (mysqli_num_rows($currChatCheckRes) == 0) {
        $convoInsert = "INSERT INTO komision.convo (convoID, userID, fl_userID)
    VALUES (NULL, '$userID', '$modID');";
        $mysqli->query($convoInsert);
    }
}

switch ($accType) {
    case 1:
        $myTable = "fl_userID";
        $theirTable = "userID";
        break;
    default:
        $myTable = "userID";
        $theirTable = "fl_userID";
        break;
}
createConvo($currID, $myTable, $currentChat, $theirTable);
function createConvo($myId, $myTable, $theirId, $theirTable): void
{
    echo $myId . "<br>" . $myTable;
}