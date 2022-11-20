<?php
// Include config file
require_once __DIR__ . "/../../config.php";


$username = $_POST['username'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$sex = $_POST['sex'];
$password = password_hash('123456', PASSWORD_DEFAULT);
$sql = "SELECT * FROM users WHERE username = '$username'";
$res = $mysqli->query($sql);
$row = mysqli_fetch_assoc($res);
if (isset($row['userID'])) {
    echo "<script>
 $('#username_err').text('Username Already taken');
</script>";
} else {
    $userQuery = "INSERT into users (userID, username, password, created_at, userType) VALUES (default, '$username', '$password', default, 0)";
    $userRes = $mysqli->query($userQuery);
    $lastId = $mysqli->insert_id;
    $profileQuery = "INSERT into profile (p_id, first_name, sur_name, weight, height, sex) VALUES ('$lastId', '$fname', '$sname', $weight, $height, '$sex')";
    $profileRes = $mysqli->query($profileQuery);
    echo"<script>reset()</script>";

    echo "<div class='alert-success'>Profile and User Account Added!</div>";
}
// Close connection
$mysqli->close();
?>

