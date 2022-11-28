<?php

require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/meta.php";

$id = $_SESSION['id'];
?>

<html lang="en">
<head>
    <title>SODA | View Profile</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center">
    <div class="container">
        <?php
        $queryProfile = "SELECT * FROM profile";
        $res = $mysqli->query($queryProfile);
        $rows = mysqli_fetch_assoc($res);
        echo "<table class='table table-hover table-dark'>
  <thead>
    <tr>
      <th scope='col'>Full name</th>
      <th scope='col'>weight</th>
      <th scope='col'>height</th>
      <th scope='col'>sex</th>
    </tr>
  </thead>
  <tbody>";
        foreach ($res as $row) {
            echo "<tr>";
            $fullname = $row['first_name'] . " " . $row['sur_name'];
            $weight = $row['weight'];
            $height = $row['height'];
            echo "<tr>
                  <th scope='row'>$fullname</th>
                  <td>$weight</td>
                  <td>$height</td>
                  <td>@mdo</td>
                </tr>";


            echo "</tr>";


        }
        echo "</tbody></table>";
        ?>
    </div>
</div>
</body>