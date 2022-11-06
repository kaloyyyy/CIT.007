<?php

require_once('config/config.php');
require_once('config/meta.php');
$id = $_SESSION['id'];
?>

<html lang="en">
<head>
    <title>SODA | Appointments</title>
</head>
<body>
<div class='d-flex flex-column justify-content-center align-items-center'>
    <h4>click the appointment you want to edit</h4>
    <div id="viewApp">
        <?php
        $query = "select * from appointments join doctor d on d.d_id = appointments.d_id where p_id = $id order by ap_date";
        $result = $mysqli->query($query);
        $rows = mysqli_fetch_assoc($result);

        foreach ($result as $row) {
            $d_id = $row['app_id'];
            $desc = $row['desc'];
            $datetime = explode(" ", $rows['ap_date']);
            echo "<div id='$d_id' class='border m-1 p-1 appList rounded editApp' style='width: 420px' onclick='editNow(this.id)'>";
            echo "<div class='subAppList ' >";
            echo $desc . "<br>";
            echo "Dr. " . $row['first_name'] . " " . $row['sur_name'] . "<br>";
            echo "Appointment Schedule is at " . $row['ap_date'];
            echo "<div>";
            echo "<div class='wrapper d-none' id='hide$d_id'>
                    <form>
                    <div class='form-group'>
                    <label>What is the Appointment for?</label>
                    <input type='text' name='desc'
                           class='form-control'
                           value='$desc' id='desc'>
                    <label>Date and Time</label>
                    <input type='date' name='date'
                           class='form-control'
                           value='$datetime[0]' id='date'>
                    <span class='invalid-feedback'></span>
                    <input type='time' name='time'
                           class='form-control'
                           value='$datetime[1]' id='time'>
                    </div>
                    <div class='form-group'>
                        <input type='button' class='btn btn-primary' value='Submit' onclick='submitEdit()'>
                        <input type='button' class='btn btn-warning' value='Cancel Appointment' onclick='cancelApp()'>
                    </div>
                </form>
            </div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <input class="d-none" value="" id="app_id">
</body>
<script>
    function cancelApp(id) {

    }

    function editNow(id) {
        $('.wrapper').addClass('d-none')
        $('.appList').addClass('editApp').removeClass('activeEdit')
        $('#' + id).removeClass('editApp').addClass('activeEdit')

        $('#hide' + id).removeClass('d-none ')
    }
</script>
</html>
