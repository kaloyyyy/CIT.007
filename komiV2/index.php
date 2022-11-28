<html lang="en">
<head>

    <?php
    require_once 'config/config.php';
    require_once 'config/lib.php';
    ?>
</head>
</html>

<body class="h-100" style="">
<div class=" container-fluid m-0 p-0">
    <div class="row d-flex justify-content-center h-100">
        <?php


        if (!isset($_SESSION)) {
            session_start();
        }
        //--Switcher upper for detecting directory


        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            $page = $_GET['page'] ?? 'home';
            require_once __DIR__ . '/components/navbar.php';

        } else {
            $page = $_GET['page'] ?? 'landing';
        }

        switch ($page) {
            case 'landing':
                require_once __DIR__ . '/src/pages/welcome.php';
                echo "<title>SODA | Welcome</title>";
                break;
            case 'login':
                require_once __DIR__ . '/src/users/login.php';
                break;
            case 'home':
                require_once __DIR__ . '/src/users/index.php';
                break;
            case 'listings':
                require_once __DIR__.'/src/listing/index.php';
                break;
            case 'messages':
                require_once __DIR__.'/src/message/index.php';
        }
        require_once __DIR__ . '/components/waves.php';
        ?>
    </div>


</div>

</body>

