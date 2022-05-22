<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="">
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title></title>
</head>
<body>
<?php
// define variables and set to empty values
$err = "";
$name = $number = $street = $barangay = $city = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (array_key_exists('submit', $_POST)) {
        if (empty($_POST["name"]) || empty ($_POST["number"]) || empty($_POST["street"]) || empty($_POST["barangay"]) || empty($_POST["city"])) {
            $err = "is required";
        } else {
            $name = $_POST["name"];
            $number = $_POST['number'];
            $street = $_POST['street'];
            $barangay = $_POST['barangay'];
            $city = $_POST['city'];
            $_SESSION['name'][] = $name;
            $_SESSION['number'][] = $number;
            $_SESSION['street'][] = $street;
            $_SESSION['barangay'][] = $barangay;
            $_SESSION['city'][] = $city;
        }
    } else if (array_key_exists('button2', $_POST)) {
        resetArray();
    }

}

function resetArray() {
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session.
    session_destroy();
}

?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="">
    <span class="error">* <?php echo $err; ?></span> <br>
    Number: <input type="text" name="number" value="">
    <span class="error">* <?php echo $err; ?></span> <br>
    Street: <input type="text" name="street" value="">
    <span class="error">* <?php echo $err; ?></span> <br>
    Barangay: <input type="text" name=barangay value="">
    <span class="error">* <?php echo $err; ?></span> <br>
    City: <input type="text" name="city" value="">
    <span class="error">* <?php echo $err; ?></span> <br>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="button2"
           class="button" value="delete all contacts"/>
    <input type="submit" name="search"
           class="button" value="search"/>
    <br><br> select key to edit or delete.<br>
    key: <input type="text" name="key" value="">
    <input type="submit" name="edit" value="Edit"/>
    <input type="submit" name="delete" value="Delete"/>
    <br><br>
</form>

<?php

function printContact($i) {
    echo "contact key: ";
    echo $i . "<br>";
    echo "name: ";
    echo $_SESSION['name'][$i] . "<br>";
    echo "number: ";
    echo $_SESSION['number'][$i] . "<br>";
    echo "street: ";
    echo $_SESSION['street'][$i] . "<br>";
    echo "barangay: ";
    echo $_SESSION['barangay'][$i] . "<br>";
    echo "city: ";
    echo $_SESSION['city'][$i] . "<br><br><br>";
}

if (array_key_exists('search', $_POST)) {
    if (empty($_POST["name"]) && empty ($_POST["number"]) && empty($_POST["street"]) && empty($_POST["barangay"]) && empty($_POST["city"])) {
        if (isset($_SESSION['name'])) {
            echo "no matches found!<br>displaying all records...<br><br>";
            $i = 0;
            $length = count($_SESSION['name']);
            for ($i; $i < $length; $i++) {
                printContact($i);
            }
        }
    } else {
        $name = $_POST["name"];
        $number = $_POST['number'];
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $i = 0;
        $length = count($_SESSION['name']);
        for ($i; $i < $length; $i++) {
            if ($name == $_SESSION['name'][$i]) {
                $match[] = $i;
            } else if ($number == $_SESSION['number'][$i]) {
                $match[] = $i;
            } else if ($street == $_SESSION['street'][$i]) {
                $match[] = $i;
            } else if ($barangay == $_SESSION['barangay'][$i]) {
                $match[] = $i;
            } else if ($city == $_SESSION['city'][$i]) {
                $match[] = $i;
            }
        }
    }
    if (isset($match)) {
        foreach ($match as $i) {
            printContact($i);
        }
    }

} else if (array_key_exists('edit', $_POST)) {
    $key = $_POST['key'];
    if (!empty($_POST['name'])) {
        $_SESSION['name'][$key] = $_POST['name'];
    }
    if (!empty($_POST['number'])) {
        $_SESSION['number'][$key] = $_POST['number'];
    }
    if (!empty($_POST['street'])) {
        $_SESSION['street'][$key] = $_POST['street'];
    }
    if (!empty($_POST['barangay'])) {
        $_SESSION['barangay'][$key] = $_POST['barangay'];
    }
    if (!empty($_POST['city'])) {
        $_SESSION['city'][$key] = $_POST['city'];
    }
    if (isset($_SESSION['name'])) {
        $i = 0;
        $length = count($_SESSION['name']);
        for ($i; $i < $length; $i++) {
            printContact($i);
        }
    }
} else if (array_key_exists('delete', $_POST)) {
    $key = $_POST['key'];
    if ($key != '') {
        array_splice($_SESSION['name'], $key, 1);
        array_splice($_SESSION['number'], $key, 1);
        array_splice($_SESSION['street'], $key, 1);
        array_splice($_SESSION['barangay'], $key, 1);
        array_splice($_SESSION['city'], $key, 1);
    } else {
        echo "no matches found!<br>displaying all records...<br><br>";
    }
    if (isset($_SESSION['name'])) {
        $i = 0;
        $length = count($_SESSION['name']);
        for ($i; $i < $length; $i++) {
            printContact($i);
        }
    }

} else {
    echo "<h2>Your contacts:</h2>";
    echo "<br>";
    if (isset($_SESSION['name'])) {
        $i = 0;
        $length = count($_SESSION['name']);
        for ($i; $i < $length; $i++) {
            printContact($i);
        }
    }
}

?>

</body>
</html>