<?php
require_once('config/config.php');

if (isset($_SESSION['userType'])) {
    $userType = $_SESSION['userType'];
    switch ($userType) {
        case '0':
            echo 'patient';
            break;
        case '1':
            echo 'doctor';
            break;
        case '2':
            echo 'admin';
            break;
        default:
            echo 'out';
            break;
    }
} else {
    include_once 'src/users/register.php';

}
?>
<html lang="en">
<head>
    <?php
    ?>
</head>
</html>