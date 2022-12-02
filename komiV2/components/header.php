
<?php
$currentPage=$_GET['page'];
if (isset($currentPage)) {
    if ($currentPage == 'message') {

    }else{
        echo "<div class='d-flex flex-row navbar komi-header align-items-center py-1' style = 'height: 2.5em'>
            <h5 class='align-items-center d-flex'>";
        echo $currentPage;
        echo "</h5></div>";
    }

} else {
    echo "<div class='d-flex flex-row navbar komi-header align-items-center py-1 ' style='height: 2.5em'>
            <h5 class='align-items-center'>";
    echo "Komision";
    echo "</h5></div>";
}
?>