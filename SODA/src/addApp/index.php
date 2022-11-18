<?php

require_once('config/config.php');
require_once('config/meta.php');


?>

<html lang="en">
<head>
    <title>SODA | Schedule</title>
    <style>

    </style>
</head>
<body>
<div class='d-flex flex-column justify-content-center align-items-center'>
    <div class="border-bottom border-top" style="width: 690px">
        <h3>Select your Doctor</h3>
        <div id="doctorList" class="w-100 d-flex">

        </div>
    </div>
    <input class="d-none" value="" id="doc_id">
    <div class="wrapper">
        <form>
            <div class="form-group">
                <label>What is the Appointment for?</label>
                <input type="text" name="desc"
                       class="form-control"
                       value="" id="desc">
                <label>Date and Time</label>
                <input type="date" name="date"
                       class="form-control"
                       value="" id="date">
                <span class="invalid-feedback"></span>
                <input type="time" name="time"
                       class="form-control"
                       value="" id="time">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-primary" value="Submit" onclick="addAppoint()">
            </div>
        </form>
    </div>
    <div id="addAppoint">
    </div>
</div>


</body>
<script>

    $('#doctorList').load('/src/look/doctors.php')

    function addDocID(d_id) {
        $("#doc_id").val(d_id);
    }

    function selectDoc(d_id) {
        console.log(d_id)
        $(".docList").removeClass('docActive')
        $('#' + d_id).addClass('docActive')
        addDocID(d_id);
    }

    function addAppoint() {
        let d_id = $("#doc_id").val();
        let date = $('#date').val();
        let time = $('#time').val();
        let desc = $('#desc').val();
        console.log(time);

        $('#addAppoint').load('/src/addApp/add.php', {
            d_id: d_id,
            date: date,
            time: time,
            desc: desc
        })
    }
</script>
</html>

