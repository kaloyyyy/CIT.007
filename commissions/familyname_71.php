<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>credit care verifier</title>
    <style>
        .inv {
            color: #cb0000;
        }

        .val {
            color: #00c000;
        }
    </style>
</head>
<body>

<?php

function form($input) {
    echo "credit card: ";
    echo "<form method='post'>
                <input type ='text' name='number' value='$input'>
                <input id='button' type='submit' name='verify' value='verify'>
            </form>";
}

if (isset($_POST['generate'])) {
    form(generate());
} else if (isset($_POST['verify'])) {
    $input = $_POST['number'];
    form($input);
    echo "<p>your input: $input </p>";
    $input = str_replace("-", "", $input);
    $input = str_replace(" ", "", $input);
    $strL = strlen($input);
    if (is_numeric($input) == 1) {
        if ($strL < 16) {
            echo "<p class = 'inv'>TRANSACTION FAILED</p>";
        } else {
            echo "<p class = 'val'>TRANSACTION SUCCESSFUL</p>";
        }
    } else {
        echo "<p class = 'inv'>TRANSACTION FAILED</p>";
    }
} else {
    form(null);
}
?>
</body>
</html>