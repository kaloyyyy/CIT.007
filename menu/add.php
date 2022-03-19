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
        <a href="add.php" id="current">Addition</a>
        <a href="subtract.php">Subtraction</a>
        <a href="multiply.php">Multiplication</a>
        <a href="divide.php">Division</a>
        <a href="oddeven.php">Odd or Even</a>
    </div></div>
    <div class="operation">
        <form method="post">
            Enter input 1:
            <input type="number" name="number1" /><br><br>
            Enter input 2:
            <input type="number" name="number2" /><br><br>
            <input  type="submit" name="submit" value="Add">
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];
            $sum =  $number1+$number2;
            echo "The sum of $number1 and $number2 is: ".$sum;
        }
        ?>
    </div>
</div>
</body>
</html>