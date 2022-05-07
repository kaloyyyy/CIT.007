<?php
// Include config file
require_once __DIR__ . "/../../config/config.php";
$modUsername = htmlspecialchars($_SESSION["username"]);
$modQue = "select * from mods where modUsername = '$modUsername'";
$modRes = $mysqli->query($modQue);
$modRow = mysqli_fetch_assoc($modRes);
$modUsername = $modRow['modUsername'];
$modID = $modRow['modID'];