<body class=" darktheme ">
<div class="container ">
    <div class="">
        <div class="row justify-content-center">
            <div class="col-2 d-flex justify-content-end ">
                <?php include 'sidebar.php';
                ?>
            </div>
            <div class=" col-7 border-start post-border border-end  p-0 m-0">
                <?php
                if (isset($_GET['page'])) {
                    $currentPage = $_GET['page'];
                }

                ?>
                <?php
                $sample = "<div class=' border-top post-border border-bottom px-3 py-2'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class=' border-top border-bottom post-border px-3 py-2'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,
                quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
                qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum
                qui dolorem eum fugiat quo voluptas nulla pariatur?</div>";
                include 'header.php';
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'Messages') {
                        echo "<div>";
                        require __DIR__ . "/../src/chats/chats.php";
                        echo "</div>";
                    } else if ($_GET['page'] == 'Listings') {
                        require __DIR__ . "/../src/post-request/post-display.php";
                    } else {

                        echo $sample . $sample . $sample . $sample;
                    }
                } else {
                    echo "<div class=' border-top post-border border-bottom px-3 py-2'>
                            dito kervs
                         </div>";
                    echo $sample . $sample;
                }

                ?>
            </div>
            <?php
            if (isset($_SESSION['id'])) {
                $username = $_SESSION['username'];
                echo "
                <div class='col-2 m-3 '>
                    <div class=' mb-4  position-fixed '><a class=' col-1 rounded-pill' id='user' href='#' data-toggle='modal' data-target='#logged-model'>
                        <i class='fa-regular fa-user'></i><span class='d-none ms-3 d-xxl-inline-block'>$username</span></a>
                    </div>
                </div>";
            } else {
                echo "<div class='col-2 m-3 '>
                    <div class=' mb-4  position-fixed '><a class=' col-1 rounded-pill' id='user' href='#' data-toggle='modal' data-target='#login-model'>
                        <i class='fa-solid fa-arrow-right-to-bracket'></i><span class=' d-none ms-3 d-xxl-inline-block'> Log-in or Sign-up</span></a>
                    </div>
                </div>";
            }
            ?>


        </div>
    </div>
</div>
</body>