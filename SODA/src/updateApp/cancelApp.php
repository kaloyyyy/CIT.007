<?php
require_once(__DIR__ . '/../../config/config.php');
$ap_id = $_POST['ap_id'];
$cancelQuery = "delete from appointments where app_id = $ap_id";
$mysqli->query($cancelQuery);