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
function generate() {
    $rng = (rand(0, 3));
    if ($rng == 0) {
        $input = (rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));
    } else if ($rng == 1) {
        $input = (rand(0, 9999) . '-' . rand(0, 9999) . '-' . rand(0, 9999) . '-' . rand(0, 9999));
    } else if ($rng == 2) {
        $input = (rand(0, 9999) . ' - ' . rand(0, 9999) . ' - ' . rand(0, 9999) . ' - ' . rand(0, 9999));
    } else {
        $input = (rand(0, 9999) . ' ' . rand(0, 9999) . ' ' . rand(0, 9999) . ' ' . rand(0, 9999));
    }
    return $input;
}

function form($input) {
    echo "credit card: ";
    echo "<form method='post'>
                <input type ='text' name='number' value='$input'>
                <input id='button' type='submit' name='generate' value='generate'>
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