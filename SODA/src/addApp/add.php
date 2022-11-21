<?php
require_once(__DIR__ . '/../../config/config.php');
$d_id = $_POST['d_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];
session_start();

$p_id = $_SESSION['id'];
$datetime = $date . ' ' . $time;
$query = "insert into appointments(app_id, d_id, p_id, ap_date, date_created, `desc`)values (default, '$d_id', '$p_id', '$datetime', default, '$desc')";

if ($mysqli->query($query) === TRUE) {
    echo "New Appointment created successfully";
} else {
    echo "Error: " . $query . "<br>";
}