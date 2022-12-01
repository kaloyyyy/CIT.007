<div class="col-2 d-flex px-2 justify-content-start">
    <div class="  komi-sidebar flex-column nav h-100 d-flex flex-column nav h-100 " style="width: 80%;">
        <div class=' d-flex flex-column position-sticky' style="top:0;">
            <div class="" style="width: 100%;">
                <?php
                function userTab($icon, $username, $target): void
                {
                    echo "
                

                        <a class='d-flex rounded-pill align-content-center justify-content-center active' id='userTab' href='#' data-toggle='modal' data-target='$target' style='width: fit-content'>
                            <div class='d-flex align-content-center justify-content-center align-items-center '>
                                <div class='rounded-pill text-center' style='width: 2.3em'>$icon</div>
                                <span class='d-none ms-3 d-xl-inline-block p-1 text-center align-items-center justify-content-center font-weight-bold'>$username</span>
                            </div>
                        </a>

                
                ";
                }

                if (isset($_SESSION['id'])) {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id'];
                    $file = '/src/uploads/' . $id . '.jpg';
                    $file2 = '/src/uploads/' . $id . '.png';
                    if (!(file_exists(__DIR__.'/../'.$file))) {
                        $file = $file2;
                    }
                    $alt = "<i class='fa-solid fa-arrow-right-to-bracket'></i>";
                    $icon = "<img src = $file alt='' class='rounded-pill'  style='width: 2.3em; height: 2.3em;'>";
                    $target = '#logged-model';
                } else {
                    $username = "Login or Signup";
                    $icon = "<i class='fa-solid fa-arrow-right-to-bracket py-2'></i>";
                    $target = '#login-model';
                }
                userTab($icon, $username, $target);
                ?>
            </div>

            <div  class=" d-flex flex-column"   style="word-wrap: break-word; width: 100%">
                <div class=" border rounded my-1 translucent p-1" style="width: 100%">
                    <?php
                    if($userType==0){
                        echo"You are a Client";
                    }else{
                        echo"You are a Freelancer";
                    }
                    ?>
                </div>
                <div class="translucent border rounded p-1">
                    My stats<br>
                    total komisions: <span id="numberOfKomi"></span>
                </div>
            </div>
        </div>

    </div>


</div>

<!--modal, dont touch-->
<div class="modal fade" id="logged-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex">
                    <div class="wrapper">
                        <div class="welcome"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
                        </div>
                        <div class="flex user-button">
                            <div class="btn btn-warning"><a href="reset-password.php">Reset Password</a></div>
                            <div class="btn btn-danger"><a href="/src/users/logout.php">Sign Out</a></div>
                        </div>

                        <br>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="image" accept="image/*" id="imageButton"/>
                        <input type="submit" value="Upload Image" name="submit" onclick="uploadImg()">
                    </form>
                    <div id="results">

                    </div>
                    <script>
                        function uploadImg() {
                            // Making the image file object
                            var file = $('#imageButton').prop("files")[0];
                            // For Multiple Files:
                            // var file = $('#imageButton').prop("files");
                            // Making the form object
                            var form = new FormData();
                            // Adding the image to the form
                            form.append("image", file);
                            // form.append("image[]", file) // for multiple files
                            // The AJAX call
                            $.ajax({
                                url        : "/src/uploads/upload.php",
                                type       : "POST",
                                data       : form,
                                contentType: false,
                                processData: false,
                                success    : function (result) {
                                    console.log(result);
                                }
                            });

                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('#toggle').on("click", function () {
            $('#lowbox').toggle('normal');

        });
    });
    $('#numberOfKomi').load('src/listing/count.php')
</script>