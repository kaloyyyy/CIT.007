<html lang="en">
<head>

    <?php
    require_once('config/config.php');
    require_once('config/meta.php');
    ?>
    <title>SODA</title></head>
</html>
<body class="h-100" style="">
<div class=" container-fluid m-0 p-0 h-100">
    <?php


    if (!isset($_SESSION)) {
        session_start();
    }
    //--Switcher upper for detecting directory
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            $page = 'home';
        } else {
            $page = 'landing';
        }

    }

    switch ($page) {
        case 'landing':
            require __DIR__ . '/src/landing/welcome.php';
            break;
        case 'home':
            include __DIR__ . '/components/header.php';
            require __DIR__ . '/src/users/index.php';
            break;
        case 'login':
        case 'user':
            require __DIR__ . '/src/users/index.php';
            break;
        case 'logout':

            require __DIR__ . '/src/users/logout.php';
            break;
        case 'viewApp':
            include __DIR__ . '/components/header.php';
            require __DIR__ . '/src/viewApp/index.php';
            break;
        case 'addApp':
            include __DIR__ . '/components/header.php';
            require __DIR__ . '/src/addApp/index.php';
            break;
        case 'updateApp':
            include __DIR__ . '/components/header.php';
            require __DIR__ . '/src/updateApp/index.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/404.php';
            break;
    }
    require_once __DIR__ . '/components/waves.php';
    ?>

</div>

</body>

