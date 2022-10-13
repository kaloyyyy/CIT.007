
<div class="modal fade" id="logged-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex">
                    <div class="wrapper">
                        <div class="welcome"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></div>
                        <div class="flex user-button">
                            <div class="btn btn-warning"><a href="reset-password.php">Reset Password</a></div>
                            <div class="btn btn-danger"><a href="/komision/src/user/logout.php">Sign Out</a></div>
                        </div>

                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
