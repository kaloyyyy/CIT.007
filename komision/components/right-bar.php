<?php
function userTab($icon, $username, $target): void
{
    echo "
                
                    <div class='position-fixed'>
                        <a class='d-flex rounded-pill align-content-center justify-content-center ' id='user' href='#' data-toggle='modal' data-target='$target' style=''>
                            <div class='d-flex align-content-center justify-content-center'>
                                <div class='rounded-pill bg-light text-center' style='width: 2em'>$icon</div>
                                <span class='d-none ms-3 d-xl-inline-block p-1 text-center'>$username</span>
                            </div>
                        </a>
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
<script>
    $(document).ready(function () {

        $('#toggle').on("click", function () {
            $('#lowbox').toggle('normal');

        });
    });

</script>
