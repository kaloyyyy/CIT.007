<div class="col-6  post-border border-left border-right  p-0 m-0">
    <?php
    require_once __DIR__ . '/../../components/header.php';
    require_once __DIR__ . '/../../config/config.php';
    require_once __DIR__ . '/../../config/lib.php';
    ?>
    <div class=" post-border border-top py-3">
        <div class="container py-3">
            <h4 class="border-bottom post-border " style="width: fit-content" >Hello <?php echo $username;?>!</h4>
            <h5 class="border-bottom post-border " style="width: fit-content">Welcome to Komision</h5>
            <h6>A local freelancing hosting service platform in the PH</h6>
        </div>
        <div class="container post-border border-top">
            <p>Upload an image to add profile picture</p>
            <form action="" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="image" accept="image/*" id="imageButton"/>
                <input type="submit" value="Upload Image" name="submit" onclick="uploadImg()">
            </form>
            <div id="results">
            </div>
        </div>
    </div>
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