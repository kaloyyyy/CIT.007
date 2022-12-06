<?php
require_once __DIR__ . "/../../config/config.php";
session_start();
$desc = $_POST['desc'];
$price = $_POST['price'];
$datetime = $_POST['deadline'];
$currID = $_SESSION['id'];


$query = "INSERT INTO komision.postrequest (postID, userID, Description, price, date_created, deadline) 
            VALUES (DEFAULT, $currID, '$desc', $price, DEFAULT, '$datetime');";
$mysqli->query($query);

