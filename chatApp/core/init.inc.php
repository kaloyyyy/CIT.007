<?php
$core_path = dirname(__FILE__);
if(empty($_GET['page']) || in_array("{$_GET['page']}.page.inc.php", (array)scandir("{$core_path}/pages"))){
    echo 'error';
}
?>
