<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
$postRequestID = $_POST['id'];
$price = $_POST['price'];
$fl_id = $_SESSION['id'];
$query = "insert into acceptrequest (ac_req_id, postRequestID, fl_userID, status, final_price, date_created) VALUES (default, $postRequestID, $fl_id, default, $price, default)";
if ($mysqli->query($query)) {
    echo "done";
}