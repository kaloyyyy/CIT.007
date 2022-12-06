<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../../components/icon.php';
require_once __DIR__ . '/../../config/config.php';
$postRequestID = $_POST['id'];
$price = $_POST['price'];
$userID = $_POST['userID'];
$username = $_POST['username'];
$fl_id = $_SESSION['id'];
$query = "insert into acceptrequest (ac_req_id, postRequestID, fl_userID, status, final_price, date_created) VALUES (default, $postRequestID, $fl_id, default, $price, default)";
if ($mysqli->query($query)) {
    $checkConvo = "SELECT convoID from convo where userID = $userID and fl_userID = $fl_id";
    $checkRes = $mysqli->query($checkConvo);
    if (mysqli_num_rows($checkRes) == 0) {
        $newConvo = "insert into convo(convoID, userID, fl_userID) 
                VALUES (default, $userID, $fl_id)";
        if ($mysqli->query($newConvo)) {
            $last_id = $mysqli->insert_id;
        }
    }
    $checkRow = mysqli_fetch_array($checkRes);
    $last_id = $checkRow[0];
    echo "<a class='btn btn-chat text-left w-100 chat-link m-0 p-1' id='$last_id' href='/?page=Messages&convo=$last_id'><div class=' p-0 m-0'>";
    echo "<div class='d-flex align-items-center'>";
    echo "<div class='d-flex align-items-center justify-content-center m-1 rounded-pill active' style='min-width: 3rem; min-height: 3rem'>";
    $img = getImg($userID, '2.5em');
    echo $img;
    echo "</div>";
    echo "<div class='d-block'  style='width: 100%'>";
    echo "<div class='' style='font-size: 1.1rem'>";
    echo $username;
    echo "</div>";
    echo "<div class='text-secondary text-truncate' style='min-width: 0; max-width: 80%'>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div></a>";
}
