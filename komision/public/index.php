<body class=" darktheme ">
<div class="container ">
    <div class="">
        <div class="row justify-content-center">
            <div class="col-2 d-flex justify-content-end ">
                <?php include 'sidebar.php';
                ?>
            </div>
            <div class=" col-7  post-border border-left border-right  p-0 m-0">
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
                <div class=' border-top border-bottom post-border  px-3 py-2'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
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
                        echo "<div >";
                        require __DIR__ . "/../src/chats/chats.php";
                        echo "</div>";
                    } else if ($_GET['page'] == 'Listings') {
                        require __DIR__ . "/../src/post-request/post-display.php";
                    } else {

                        echo $sample . $sample . $sample . $sample;
                    }
                } else {

                    echo $sample . $sample;
                }

                ?>
            </div>
            <?php
            function userTab($icon, $username, $target): void
            {
                echo "
                <div class= 'col-2 m-2'>
                    <div class='position-fixed'>
                        <a class='d-flex rounded-pill align-content-center justify-content-center ' id='user' href='#' data-toggle='modal' data-target='$target' style=''>
                            <div class='d-flex align-content-center justify-content-center'>
                                <div class='rounded-pill bg-light text-center' style='width: 2em'>$icon</div>
                                <span class='d-none ms-3 d-xl-inline-block p-1 text-center'>$username</span>
                            </div>
                        </a>
                    </div>
                </div>
                ";
            }

            if (isset($_SESSION['id'])) {
                $username = $_SESSION['username'];
                $id = $_SESSION['id'];
                $file = '/komision/src/uploads/'.$id.'.jpg';
                $file2 = '/komision/src/uploads/'.$id.'.png';
                if(!file_exists($file)) {
                }
                $alt = "<i class='fa-solid fa-arrow-right-to-bracket'></i>";
                $icon = "<img src = $file alt='' class='rounded-pill'  style='height: 2em'>";
                $target = '#logged-model';
            } else {
                $username = "Login or Signup";
                $icon = "<i class='fa-solid fa-arrow-right-to-bracket py-2'></i>";
                $target = '#login-model';
            }
            userTab($icon, $username, $target);
            ?>


        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        $('#toggle').on("click", function () {
            $('#lowbox').toggle('normal');

        });
    });

</script>
</body>