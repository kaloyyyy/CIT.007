<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Q Pass</title>
    <style>

    </style>
</head>
<body>
<?php
$qPass = 181502;
echo "Today is: ";
echo date("l jS \of F Y")."<br>";
echo "Your QPass code is: $qPass<br>";
switch (date("l")){
    case "Monday"||"Wednesday"||"Friday":
        if($qPass%2==0){
            echo "You are not allowed to go out today";
        }else{
            echo "You are allowed to go out today";
        }
        break;
    case "Tuesday"||"Wednesday"||"Saturday":
        if($qPass%2==0){
            echo "You are allowed to go out today";
        }else{
            echo "You are not allowed to go out today";
        }
        break;
}
?>
</body>
</html>