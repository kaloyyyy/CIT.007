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
  <tbody>
    <tr>
      <th scope='row'>1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>";
foreach ($res as $row) {
    echo "<tr>";




    echo "</tr>";
    $p_id= $row['p_id'];
    echo "<div id='$p_id' class='border m-1 p-1 docList rounded'  style='width: 420px'>";
    echo "<div class=' ' >";
    echo $row['first_name'] . " " . $row['sur_name'] . "<br>";
    echo "</div>";
    echo "</div>";

}
?>
</body>