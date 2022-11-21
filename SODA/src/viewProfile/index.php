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
foreach ($res as $row) {
    $p_id= $row['p_id'];
    echo "<div id='$p_id' class='border m-1 p-1 docList rounded'  style='width: 420px'>";
    echo "<div class=' ' >";
    echo $row['first_name'] . " " . $row['sur_name'] . "<br>";
    echo "</div>";
    echo "</div>";
}
?>
</body>