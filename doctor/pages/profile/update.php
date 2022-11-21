<?php
require_once(__DIR__ . '/../../config.php');
$p_id = $_POST['p_id'];
$weight = $_POST['weight'];
$height = $_POST['height'];
if(!isset($_SESSION)){
    session_start();
}

$query = "UPDATE profile t
SET t.`weight` = '$weight', t.height = '$height'
WHERE t.p_id = $p_id";

if ($mysqli->query($query) === TRUE) {
    echo "Appointment updated successfully";
} else {
    echo "Error: " . $query . "<br>";
}