<?php
chdir(dirname(__DIR__));
?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <?php include __DIR__ . '/config/meta.php';
    ?>
    <title>Komi-sion</title>
</head>
<?php
require_once 'config/config.php';
require_once 'config/meta.php';
if (!isset($_SESSION)) {
    session_start();
}
$login = "src/user/login.php";
$register ='src/user/register.php';
$home = 'public/index.php';
$logged ='src/user/logged-in.php';
$posting = 'src/post-request/index.php';
require $home;
if (isset($_SESSION['id'])) {
    require $logged;
    require $posting;
} else {
    require $login;
    require $register;
}

?>
</html>



