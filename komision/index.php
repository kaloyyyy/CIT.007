<?php
chdir(dirname(__DIR__));
require_once 'config/config.php';
require_once 'config/meta.php';
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/config/meta.php';
    ?>
    <title>Komi-sion</title>
</head>
<body class=" darktheme ">
<div class="container-fluid">
    <div class="px-xl-5">
        <div class="row d-flex justify-content-center">
            <?php



            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                $page = $_GET['page'] ?? 'home';
            } else {
                $page = $_GET['page'] ?? 'landing';
            }
            if($page!='landing'){
                require_once 'components/left-bar.php';
                echo "<div class=' col-6  post-border border-left border-right  p-0 m-0'>";
                require_once 'components/header.php';
                switch ($page) {
                    case 'welcome':

                        break;
                    case 'home':

                        require_once 'src/pages/sample.php';

                        break;
                    case 'login':
                        require_once 'src/user/login.php';
                        require_once 'src/user/register.php';
                        break;
                }
                echo "</div><div class= 'col-2 m-2'>";
                include_once 'components/right-bar.php';
                echo "</div>";
            }else{
                header('location: /src/pages/welcome.php');
            }

            ?>
        </div>
    </div>
</div>
</body>

</html>



