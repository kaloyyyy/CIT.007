<?php
require_once 'config.php';

?>

<html lang="en">
<head>
<title>Doctor Appointments</title>
</head>
<body>
<div class="body h-100 w-100">
    <?php

        if(!isset($_SESSION['id'])){
            include_once 'pages/account/login.php';
        }
    ?>
</div>
</body>
</html>
