<?php
// Include config file
require_once __DIR__ . "/../../config/config.php";
$modID = $_GET['mod'];
$modQue = "select * from mods where modID = $modID";
$modRes = mysqli_query($mysqli, $modQue);
$modRow = mysqli_fetch_assoc($modRes);
$modUsername = $modRow['modUsername'];
$modID = $modRow['modID'];