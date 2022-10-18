<?php
if (isset($currentPage)) {
    if ($currentPage == 'Messages') {

    }else{
        echo "<div class='flex-row align-content-between navbar komi-header'>
            <h5>";
        echo $currentPage;
        echo "</h5></div>";
    }

} else {
    echo "<div class='flex-row align-content-between navbar komi-header'>
            <h5>";
    echo "Komision";
    echo "</h5></div>";
}
?>
<script>

</script>