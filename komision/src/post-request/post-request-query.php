<?php
require_once __DIR__ . "/../../config/config.php";
session_start();
$desc = $_POST['desc'];
$price = $_POST['price'];
$currID = $_SESSION['id'];
echo $price . $desc;

$query = "INSERT INTO komision.postrequest (postID, userID, Description, price, date_created) 
            VALUES (DEFAULT, $currID, '$desc', $price, DEFAULT);";
$mysqli->query($query);