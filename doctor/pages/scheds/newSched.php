<?php

require_once __DIR__ . '/../../config.php';
require_once __DIR__.'/../layout/background.php';
$d_id = $_POST['d_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];
$p_id = $_SESSION['id'];
if(!isset($_SESSION)){
    session_start();
}


$datetime = $date . ' ' . $time;
$query = "insert into appointments(app_id, d_id, p_id, ap_date, date_created, description)values (default, '$d_id', '$p_id', '$datetime', default, '$desc')";

if ($mysqli->query($query) === TRUE) {
    echo "New Appointment created successfully";
} else {
    echo "Error: " . $query . "<br>";
}