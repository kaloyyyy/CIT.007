<?php
// Initialize the session
session_start();

chdir(dirname(__DIR__));

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../../config/meta.php'; ?>
    <meta charset="UTF-8">
    <title>Komi-sion</title>
</head>
<body>
<?php include_once __DIR__ . '/../../public/header.php';
include_once 'convo-list.php';
?>

</body>
</html>