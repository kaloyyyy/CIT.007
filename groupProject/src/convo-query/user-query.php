<?php
require_once __DIR__ . "/../../config/config.php";
$userName = htmlspecialchars($_SESSION["username"]);
$userQue = "select * from users where userName = '$userName'";
$userRes = mysqli_query($mysqli, $userQue);
$userRow = mysqli_fetch_assoc($userRes);
$userID = $userRow['userID'];

