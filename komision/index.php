<?php
require_once 'config/config.php';
require_once 'config/meta.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = "src/user/login.php";
$home = 'public/index.php';

if (isset($_SESSION['id'])) {
    require $home;
} else {
    require $home;
}





