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

        function title($title): void
        {
            echo "<title>Komision | $title</title>";
        }
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
                title('Welcome');
                break;
            case 'login':
                require_once __DIR__ . '/src/users/login.php';
                title('Login');
                break;
            case 'home':
                require_once __DIR__ . '/src/users/index.php';
                title('Home');
                break;
            case 'listings':
                require_once __DIR__.'/src/listing/index.php';
                title("Listings");
                break;
            case 'messages':
                require_once __DIR__.'/src/message/index.php';
                title("Messages");
                break;
            case 'template':
                require_once __DIR__.'/src/template/template.php';
                break;
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            require_once __DIR__ . '/components/dashboard.php';

        }
        require_once __DIR__ . '/components/waves.php';
        require_once __DIR__.'/src/request/index.php';
        ?>
    </div>


</div>

</body>

