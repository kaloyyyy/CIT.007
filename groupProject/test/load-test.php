<?php
require_once __DIR__ . "/../config/config.php";
$testNewCount = $_POST['testNewCount'];
$sql = "SELECT * FROM comments LIMIT $testNewCount";
$result = mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<p>";
        echo $row['author'];
        echo "<br>".$row['message']."<br>";
        echo "</p>";
    }
}
?>
