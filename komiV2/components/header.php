
<?php
$currentPage=$_GET['page'];
if (isset($currentPage)) {
    if ($currentPage == 'message') {

    }else{
        echo "<div class='flex-row navbar komi-header' style = 'height: 5vh'>
            <h5>";
        echo $currentPage;
        echo "</h5></div>";
    }

} else {
    echo "<div class='flex-row navbar komi-header' style='height: 5vh'>
            <h5>";
    echo "Komision";
    echo "</h5></div>";
}
?>