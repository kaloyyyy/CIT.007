<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bigger number</title>
    <style>
        h6{
            margin: 0;
        }
    </style>
</head>
<body>
<?php
$i=1;
do{
    $size = $i."px";
    echo "<h6 style ='font-size: $size;'>".$i."</h6><br>";
    $i++;
}while($i<=30);
?>
</body>
</html>