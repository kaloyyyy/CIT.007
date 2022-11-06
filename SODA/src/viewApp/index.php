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
    <div id="viewApp">
        <?php
        $query = "select * from appointments join doctor d on d.d_id = appointments.d_id where p_id = $id order by ap_date";
        $result = $mysqli->query($query);
        $rows = mysqli_fetch_assoc($result);

        foreach ($result as $row) {
            $app_id = $row['app_id'];
            $desc = $row['desc'];
            echo "<div id='$app_id' class='border m-1 p-1 appList rounded' style='width: 420px'>";
            echo "<div class='subAppList ' >";
            echo $desc . "<br>";
            echo "Dr. " . $row['first_name'] . " " . $row['sur_name'] . "<br>";
            $specQuery = "SELECT * FROM specialties_list join specialties_taken st on specialties_list.spec_id = st.spec_id where d_id=$app_id";
            $specRes = $mysqli->query($specQuery);
            foreach ($specRes as $spec) {
                echo $spec['spec_name'] . "<br>";
            }
            echo "Appointment Schedule is at " . $row['ap_date'];
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
<script>
</script>
</html>
