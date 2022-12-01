<?php
if (!isset($_SESSION)) {
    session_start();
}
$id = $_SESSION['id'];
require_once __DIR__ . '/../../config/config.php';
$query = "select * from acceptrequest where fl_userID=$id";
$res = $mysqli->query($query);
$row = mysqli_num_rows($res);
echo  $row;
?>