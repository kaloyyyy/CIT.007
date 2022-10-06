<?php
require_once 'config/config.php';
require_once 'config/meta.php';
session_start();
require_once 'public/index.php';
if ($_SESSION['loggedin']){
    echo "naka login ka na";
    if ($_SESSION['accType']==0){
        echo "<br>di ka moderator";
    }
}