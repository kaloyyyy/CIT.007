<?php
session_start();
$id = $_SESSION['id'];
$userType = $_SESSION['userType'];
if ($userType == 0) {
    $query = "select * from appointments join doctor d on d.d_id = appointments.d_id where p_id = $id order by ap_date";
} else {
    $query = "select * from appointments join profile p on p.p_id = appointments.p_id where d_id = $id order by ap_date";
}
require_once(__DIR__ . '/../../config/config.php');

$result = $mysqli->query($query);
$rows = mysqli_fetch_assoc($result);

foreach ($result as $row) {
    $app_id = $row['app_id'];
    $desc = $row['desc'];
    $datetime = explode(" ", $row['ap_date']);
    echo "<div id='$app_id' class='border m-1 p-1 appList rounded editApp' style='width: 420px' onclick='editNow(this.id)'>";
    echo "<div class='subAppList ' >";
    echo $desc . "<br>";
    echo "Dr. " . $row['first_name'] . " " . $row['sur_name'] . "<br>";
    echo "Appointment Schedule is at " . $row['ap_date'];
    echo "<div>";
    echo "<div class='wrapper d-none' id='hide$app_id'>
                    <form>
                    <div class='form-group'>
                    <label>What is the Appointment for?</label>
                    <input type='text' name='desc'
                           class='form-control'
                           value='$desc' id='desc-$app_id'>
                    <label>Date and Time</label>
                    <input type='date' name='date'
                           class='form-control'
                           value='$datetime[0]' id='date-$app_id'>
                    <span class='invalid-feedback'></span>
                    <input type='time' name='time'
                           class='form-control'
                           value='$datetime[1]' id='time-$app_id'>
                    </div>
                    <div class='form-group'>
                        <input type='button' class='btn btn-primary' value='Submit' onclick='submitEdit($app_id)'>
                        <input type='button' class='btn btn-warning' value='Cancel Appointment' onclick='cancelApp($app_id)'>
                    </div>
                </form>
            </div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>