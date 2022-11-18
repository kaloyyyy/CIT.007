<?php

require_once('config/config.php');
require_once('config/meta.php');
$id = $_SESSION['id'];
?>

<html lang="en">
<head>
    <title>SODA | Update</title>
</head>
<body>
<div class='d-flex flex-column justify-content-center align-items-center'>
    <h4>click the appointment you want to edit</h4>
    <div id="viewApp">

    </div>

    <div class="bg-success m-1 p-1 d-none rounded" id="app_id"></div>
    <div id="cancel" class="bg-warning m-1 p-1 d-none rounded">
    </div>
</body>
<script>
    $('#viewApp').load('/src/updateApp/loadApp.php');

    function loadApp() {
        $('#viewApp').load('/src/updateApp/loadApp.php')
    }

    function cancelApp(id) {
        console.log(id);
        $('#app_id').load('/src/updateApp/cancelApp.php', {
            ap_id: id
        })
        $('#viewApp').load('/src/updateApp/loadApp.php');
        $('#cancel').text("Cancelled Appointment").removeClass('d-none')
    }

    function submitEdit(app_id) {
        let date = $('#date-' + app_id).val();
        let time = $('#time-' + app_id).val();
        let desc = $('#desc-' + app_id).val();
        console.log(desc);
        $('#app_id').load('/src/updateApp/updateApp.php', {
            app_id: app_id,
            date  : date,
            time  : time,
            desc  : desc
        })
        setTimeout(loadApp, 10);
        $('#app_id').removeClass('d-none')

    }

    function editNow(id) {
        $('.wrapper').addClass('d-none')
        $('.appList').addClass('editApp').removeClass('activeEdit')
        $('#' + id).removeClass('editApp').addClass('activeEdit')
        $('#hide' + id).removeClass('d-none ')
    }
</script>
</html>
