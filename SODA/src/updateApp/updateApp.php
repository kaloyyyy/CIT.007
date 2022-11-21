<?php
require_once(__DIR__ . '/../../config/config.php');
$app_id = $_POST['app_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];
session_start();
$p_id = $_SESSION['id'];
$datetime = $date . ' ' . $time;
$query = "UPDATE appointments t
SET t.`desc` = '$desc', t.ap_date = '$datetime'
WHERE t.app_id = $app_id";

if ($mysqli->query($query) === TRUE) {
    echo "Appointment updated successfully";
} else {
    echo "Error: " . $query . "<br>";
}