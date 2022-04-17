<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PIN</title>
</head>
<body>
using brute force using a loop since md5 is a one way function.<br>
<?php
$pin1 = 'f4552671f8909587cf485ea990207f3b';

$pin2 = '647bba344396e7c8170902bcf2e15551';

$pin3 = '2afe4567e1bf64d32a5527244d104cea';
$testNum = 0;
$count = 0;
$testNum = str_pad($testNum, 3, '0', STR_PAD_LEFT);
for ($i = 0; $i<1000;$i++){
    $testNum = $i;
    $testNum = str_pad($testNum, 3, '0', STR_PAD_LEFT);
    $hashNum = md5(strval($testNum));
    if($pin1 == $hashNum){
        echo $pin1.'       =  '. $testNum.'<br>';
        $count++;
    }else if($pin2 == $hashNum){
        echo $pin2.'    = '. $testNum.'<br>';
        $count++;
    }else if($pin3 == $hashNum){
        echo $pin3.' = '.$testNum.'<br>';
        $count++;
    }else if($count == 3){
        break;
    }
}
?>
</body>
</html>
