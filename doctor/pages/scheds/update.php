<?php
require_once(__DIR__ . '/../../config.php');
$app_id = $_POST['ap_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];
if(!isset($_SESSION)){
    session_start();
}
$p_id = $_SESSION['id'];
$datetime = $date . ' ' . $time;
$query = "UPDATE appointments t
SET t.`description` = '$desc', t.ap_date = '$datetime'
WHERE t.app_id = $app_id";

if ($mysqli->query($query) === TRUE) {
    echo "Appointment updated successfully";
} else {
    echo "Error: " . $query . "<br>";
}