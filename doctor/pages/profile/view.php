<?php
require_once __DIR__ . "/../../config.php";



require_once __DIR__ . '/../layout/background.php';
require_once __DIR__ . '/../layout/header.php';
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
                <th scope="col">Username</th>
                <th scope="col">Given Name</th>
                <th scope="col">Surname</th>
                <th scope="col">gender</th>
                <th scope="col">weight</th>
                <th scope="col">height</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * from profile left join users u on u.userID = profile.p_id";
            $res = $mysqli->query($query);
            foreach ($res as $row){
                $p_id = $row['p_id'];
                $username = $row['username'];
                $gName = $row['given_name'];
                $sName = $row['sur_name'];
                $weight =$row['weight'];
                $height = $row['height'];
                $gender = $row['gender'];
                echo "<tr class='' onclick='editOn($p_id)'>";
                echo "<td>$username</td>";
                echo "<td>$gName</td>";
                echo "<td>$sName</td>";
                echo "<td>$gender</td>";
                echo "<td><input value='$weight' id='w$p_id' class='$p_id' type='number' readonly></td>";
                echo "<td><input value='$height' id='h$p_id' class='$p_id' type='number' readonly>
                        <input id='s$p_id' type='button' onclick='saveEdit($p_id)' value='save' class='bg-primary rounded border-0 mx-2 my-1 button d-none save'></td>";

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
    function editOn(p_id) {
        console.log(p_id);
        $('.read').attr('readonly');
        $('input').attr('readonly');
        $('.' + p_id).removeAttr('readonly');
        $('.save').addClass('d-none');
        $('#s' + p_id).removeClass('d-none')
    }

    function saveEdit(p_id) {
        let weight = $("#w" + p_id).val()
        let height = $("#h" + p_id).val()
        $('#saveEdit').load('/pages/profile/update.php', {
            p_id: p_id,
            weight : weight,
            height : height,
        })
    }
</script>
</html>

