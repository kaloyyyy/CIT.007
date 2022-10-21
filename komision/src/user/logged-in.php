
<div class="modal fade" id="logged-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></h5>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="image" accept="image/*" id="imageButton"/>
                        <input type="submit" value="Upload Image" name="submit" onclick="uploadImg()">
                    </form>
                    <div id="results">

                    </div>
                    <script>
                        function uploadImg(){
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
                                url: "/komision/src/uploads/upload.php",
                                type: "POST",
                                data:  form,
                                contentType: false,
                                processData:false,
                                success: function(result){
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
