<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class = "menu">
    <div class="nav">
        <div class="choices">
            <a href="add.php">Addition</a>
            <a href="subtract.php">Subtraction</a>
            <a href="multiply.php">Multiplication</a>
            <a href="divide.php">Division</a>
            <a href="oddeven.php"id="current">Odd or Even</a>
        </div></div>
    <div class="operation">
        <form method="post">
            Enter input:
            <input type="number" name="number1" /><br><br>
            <input id="button" type="submit" name="submit" value="Submit">
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $number1 = $_POST['number1'];
            if($number1%2 == 0){
                echo "The given value $number1 even";
            }else{
                echo "The given value $number1 odd";
            }
        }
        ?>
    </div>
</div>
<script>
    document.getElementById("button").style.backgroundColor="#00fff8";
    document.getElementById("button").style.color="#000000";
</script>
</body>
</html>