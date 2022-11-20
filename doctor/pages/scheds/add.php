<?php
require_once __DIR__ . '/../../config.php';
include __DIR__ . '/../layout/header.php';

?>
<html lang="en">
<head>
    <title>Schedule</title>

</head>
<body>
<div class='d-flex flex-column justify-content-center align-items-center container'>
    <div class="wrapper w-50">
        <form>
            <div class="form-group">
                <label>Appointment details:</label>
                <input type="text" name="description"
                       class="form-control"
                       value="" id="description">
                <br>
                <label>Select your Doctor</label>
                <?php
                $query = "select * from doctor";
                $res = $mysqli->query($query);
                foreach ($res as $row) {
                    $d_id = $row['d_id'];
                    $fname = $row['first_name'];
                    $sname = $row['sur_name'];
                    echo "<br><input type='radio' name='doctor' class='' value='$d_id'>$fname $sname";

                }
                ?><br><br>
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
                <input type="button" class="btn btn-primary" value="Submit" onclick="addSched()">
            </div>
        </form>
        <div id="addAppoint">
        </div>
    </div>

</div>
<?php
require_once __DIR__ . '/../layout/background.php';
?>

</body>
<script>
    function addSched() {
        let d_id = $("input[type='radio']:checked").val()
        let date = $('#date').val();
        let time = $('#time').val();
        let desc = $('#description').val();
        $('#addAppoint').load('/pages/scheds/newSched.php', {
            d_id: d_id,
            date: date,
            time: time,
            desc: desc
        })
    }
</script>
</html>

