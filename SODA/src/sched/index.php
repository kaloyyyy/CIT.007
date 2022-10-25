<?php
if (isset($_SESSION['userType'])) {
    $userType = $_SESSION['userType'];
    if ($userType == 2) {
        echo 'admin';
    } else if ($userType == 1) {
        echo 'doctor';

    } else {
        echo 'user';
    }
}
include_once 'add.php';