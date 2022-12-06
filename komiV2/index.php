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
            $page = $_GET['page'] ?? 'Home';
            if ($page != 'Home') {
                require_once __DIR__ . '/components/navbar.php';
            }
            $userType = $_SESSION['userType'];
        } else {
            $page = $_GET['page'] ?? 'Landing';
        }
        if(!isset($_SESSION['username'])){
            $page = "Landing";
        }
        switch ($page) {
            case 'Landing':
                require_once __DIR__ . '/src/pages/welcome.php';
                title('Welcome');
                break;
            case 'Login':
                require_once __DIR__.'/src/users/login.php';
                break;
            case 'Home':
                require_once __DIR__ . '/src/pages/welcome.php';
                title('Home');
                break;
            case 'Listings':
                require_once __DIR__ . '/src/listing/index.php';
                title("Listings");
                break;
            case 'Messages':
                require_once __DIR__ . '/src/message/index.php';
                title("Messages");
                break;
            case 'Template':
                require_once __DIR__ . '/src/template/template.php';
                break;
            case 'User':
                require_once __DIR__ . '/src/profile/index.php';
                break;
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            if ($page != 'Home') {
                require_once __DIR__ . '/components/dashboard.php';
            }


        }
        require_once __DIR__ . '/components/waves.php';
        require_once __DIR__ . '/src/request/index.php';
        ?>
    </div>


</div>

</body>

