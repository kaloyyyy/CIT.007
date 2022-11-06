<?php

require_once(__DIR__ . '/../../config/meta.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

} else {

}
include __DIR__ . '/../../components/waves.php';
?>
<div class="d-flex flex-column justify-content-center align-items-center container-fluid animation" id="sodaWelcome">
    <div class="d-flex flex-column justify-content-center align-items-center rounded" id="welcomeBox">
        <h2 class="text-center" style="">System for Online Doctor Appointment</h2>
        <h1 class="" style="">S O D A</h1>
        <a href="?page=user" class="rounded-pill  px-3 border btn" id="getStarted">get
            started</a>
    </div>

</div>





