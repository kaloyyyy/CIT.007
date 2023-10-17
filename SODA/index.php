<html lang="en">
<head>

    <?php
    require_once('config/config.php');
    require_once('config/meta.php');
    ?>
</head>
</html>
<body class="h-100" style="">
<div class=" container-fluid m-0 p-0 h-100">
    <?php


    if (!isset($_SESSION)) {
        session_start();
    }
    //--Switcher upper for detecting directory


    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        $page = $_GET['page'] ?? 'home';
        require_once __DIR__ . '/components/header.php';

    } else {
        $page = $_GET['page'] ?? 'landing';
    }

    switch ($page) {
        case 'landing':
            require_once __DIR  __ . '/src/landing/welcome.php';
            echo "<title>SODA | Welcome</title>";
            break;
        case 'home':

            require_once __DIR__ . '/src/users/index.php';
            echo "<title>SODA | Home</title>";
            break;
        case 'login':
            require_once __DIR__.'src/users/login.php';
            break;
        case 'user':
            require_once __DIR__ . '/src/users/index.php';
            break;
        case 'logout':
            require_once __DIR__ . '/src/users/logout.php';
            break;
        case 'viewApp':
            require_once __DIR__ . '/src/viewApp/index.php';
            break;
        case 'addApp':
            require_once __DIR__ . '/src/addApp/index.php';
            break;
        case 'updateApp':
            require_once __DIR__ . '/src/updateApp/index.php';
            break;
        case 'addProfile':
            require_once __DIR__ . '/src/addProfile/index.php';
            break;
        case 'viewProfile':
            require_once __DIR__.'/src/viewProfile/index.php';
            break;
        default:
            http_response_code(404);
            require_once __DIR__ . '/404.php';
            break;
    }
    require_once __DIR__ . '/components/waves.php';
    ?>

</div>

</body>

