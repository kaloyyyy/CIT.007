<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__.'/../../config/config.php';
$id = $_SESSION['id'];
$accType = $_SESSION['userType'];
if ($accType == 0) {
    $myType = 'userID';
    $conversationQuery = "select * from convo left join freelancers f on f.freelancerID = convo.fl_userID left join users u on u.userID = f.freelancerID where convo.userID = $id";
} else {
    $myType='fl_userID';
    $conversationQuery = "select * from convo left join users u on u.userID = convo.userID where convo.fl_userID = $id";

}
$conversationRes = $mysqli->query($conversationQuery);

foreach ($conversationRes as $rows){
    echo $rows['username']."<br>";
}