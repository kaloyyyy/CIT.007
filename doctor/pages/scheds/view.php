<?php
require_once __DIR__ . '/../../config.php';
include __DIR__ . '/../layout/header.php';
if (!isset($_SESSION)) {
    session_start();
}
$id = $_SESSION['id'];
$userType = $_SESSION['userType'];

?>
<html lang="en">
<head>

    <title>view | edit</title>
</head>
<body>
<div class="container text-center">
    <div class="container border border-dark col-12 p-0">
        <table class="table table-striped ">
            <thead class="">
            <tr class="">
                <th scope="col" class="<?php if ($userType == 1) {
                    echo 'd-none';
                } ?>">Doctor
                </th>
                <th scope="col" class="<?php if ($userType == 0) {
                    echo 'd-none';
                } ?>">Patient
                </th>
                <th scope="col">Date and time</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if ($userType == 0) {
                $query = "select app_id, description ,ap_date, d.sur_name dSname, d.given_name dFname from appointments join doctor d on d.d_id = appointments.d_id where p_id = $id order by ap_date";
            } else if ($userType == 1) {
                $query = "select app_id, description ,ap_date, p.sur_name pSname, p.given_name pFname from appointments join profile p on p.p_id = appointments.p_id where d_id = $id order by ap_date";
            } else {
                $query = "select app_id, description ,ap_date, p.given_name pFname, p.sur_name pSname, d.sur_name dSname, d.given_name dFname from appointments join profile p on appointments.p_id = p.p_id join doctor d on d.d_id = appointments.d_id order by ap_date";
            }
            $result = $mysqli->query($query);
            foreach ($result as $row) {
                $ap_id = $row['app_id'];
                echo "<tr class='' onclick='editOn($ap_id)'> ";
                if ($userType == 0) {
                    $dname = $row['dFname'] . " " . $row['dSname'];
                    echo "<td>$dname</td>";
                } else if ($userType == 1) {
                    $pname = $row['pFname'] . " " . $row['pSname'];
                    echo "<td>$pname</td>";
                } else {
                    $dname = $row['dFname'] . " " . $row['dSname'];
                    $pname = $row['pFname'] . " " . $row['pSname'];
                    echo "<td>$dname</td>";
                    echo "<td>$pname</td>";
                }

                $datetime = explode(" ", $row['ap_date']);
                $desc = $row['description'];
                echo "<td><input id='date$ap_id' value=$datetime[0] readonly class='$ap_id read' type='date'>
                            <input id='time$ap_id' value=$datetime[1] readonly class='$ap_id read' type='time'></td>";
                echo "<td><input id='desc$ap_id' value=$desc readonly class='$ap_id read'>
                <input id='s$ap_id' type='button' onclick='saveEdit($ap_id)' value='save' class='bg-primary rounded border-0 mx-2 my-1 button d-none save'></td>";

                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
        <?php
        ?>

    </div>
    <div id="saveEdit" class="alert-success container w-25"></div>
</div>
<?php

require_once __DIR__ . '/../layout/background.php';
?>
</body>
<script>
    function editOn(ap_id) {
        console.log(ap_id);
        $('.read').attr('readonly');
        $('input').attr('readonly');
        $('.' + ap_id).removeAttr('readonly');
        $('.save').addClass('d-none');
        $('#s' + ap_id).removeClass('d-none')
    }

    function saveEdit(ap_id) {
        let date = $("#date" + ap_id).val()
        let time = $("#time" + ap_id).val()
        let desc = $("#desc" + ap_id).val()
        $('#saveEdit').load('/pages/scheds/update.php', {
            ap_id: ap_id,
            date : date,
            time : time,
            desc : desc
        })
    }
</script>
</html>
