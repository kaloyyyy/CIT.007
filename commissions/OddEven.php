<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>odd even</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            min-width: 45px;
        }
        .label{
            background: #34c4fc;
        }
    </style>
</head>
<body><center>
<div class="table">
<?php
echo"<table><tr class='label'><td>odd</td><td>even</td></tr>";
for($i=1;$i<=100;$i+=2){
    $j = $i+1;
    echo"
        <tr>
            <td>$i</td>
            <td>$j</td>
        </tr>
    ";
}
echo "</table>";
?>
</div>
</center</body>
</html>