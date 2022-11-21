<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../config/meta.php');
$queryDoctor = "select * from doctor";
$results = $mysqli->query($queryDoctor);
$rows = mysqli_fetch_assoc($results);

foreach ($results as $row) {
    $d_id = $row['d_id'];
    echo "<div id='$d_id' class='border m-1 p-1 docList rounded' onclick='selectDoc(this.id)' style='width: 420px'>";
    echo "<div class=' ' >";
    echo "Dr. " . $row['first_name'] . " " . $row['sur_name'] . "<br>";
    $specQuery = "SELECT * FROM specialties_list join specialties_taken st on specialties_list.spec_id = st.spec_id where d_id=$d_id";
    $specRes = $mysqli->query($specQuery);
    foreach ($specRes as $spec) {
        echo $spec['spec_name'] . "<br>";
    }
    echo "</div>";
    echo "</div>";
}
?>

