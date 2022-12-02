<?php
// Initialize the session
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/lib.php";

// Check if the user is logged in, if not then redirect him to login page



if(isset($_POST['sub'])) {
    $id = $_GET['update'];
    $fullname = $_POST['dFullName'];



    $sql = "UPDATE users SET userID = '$id', username = '$fullname' WHERE userID = '$id'";
    $result = mysqli_query($mysqli, $sql);
    if ($result) {

        echo '<script type="text/javascript">window.top.location="/src/users/logout.php";</script>';

    }


}
?>


<?php
require_once __DIR__ . '/../../components/waves.php';
?>


<?php
$currentClient = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$currentClient'";

$result = mysqli_query($mysqli, $sql);

if ($result) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Web_Tech/css/style.css">
    <title>MedBook</title>
</head>
<style>
    .panel {
        margin-bottom: 23px;
        background-color: #ffffff;
        border: 1px solid transparent;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    .panel-body {
        padding: 15px;
    }
    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-right-radius: 2px;
        border-top-left-radius: 2px;
    }
    .panel-heading > .dropdown .dropdown-toggle {
        color: inherit;
    }
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 15px;
        color: inherit;
    }
    .panel-title > a,
    .panel-title > small,
    .panel-title > .small,
    .panel-title > small > a,
    .panel-title > .small > a {
        color: inherit;
    }
    .panel > .list-group,
    .panel > .panel-collapse > .list-group {
        margin-bottom: 0;
    }
    .panel > .list-group .list-group-item,
    .panel > .panel-collapse > .list-group .list-group-item {
        border-width: 1px 0;
        border-radius: 0;
    }
    .panel > .list-group:first-child .list-group-item:first-child,
    .panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {
        border-top: 0;
        border-top-right-radius: 2px;
        border-top-left-radius: 2px;
    }
    .panel > .list-group:last-child .list-group-item:last-child,
    .panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {
        border-bottom: 0;
        border-bottom-right-radius: 2px;
        border-bottom-left-radius: 2px;
    }
    .panel > .panel-heading + .panel-collapse > .list-group .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .panel-heading + .list-group .list-group-item:first-child {
        border-top-width: 0;
    }
    .list-group + .panel-footer {
        border-top-width: 0;
    }


    .panel-primary > .panel-heading {
        color: #ffffff;
        background-color: #2196f3;
    }
    .panel-primary > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #2196f3;
    }
    .panel-primary > .panel-heading .badge {
        color: #2196f3;
        background-color: #ffffff;
    }
    .panel-primary > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #2196f3;
    }


    .upload{
        width: 140px;
        position: relative;
        margin: auto;
        text-align: center;
    }
    .upload img{
        border-radius: 50%;
        border: 8px solid #DCDCDC;
        width: 125px;
        height: 125px;
    }
    .upload .rightRound{
        position: absolute;
        bottom: 0;
        right: 0;
        background: #00B4FF;
        width: 32px;
        height: 32px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }
    .upload .leftRound{
        position: absolute;
        bottom: 0;
        left: 0;
        background: red;
        width: 32px;
        height: 32px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }
    .upload .fa{
        color: white;
    }
    .upload input{
        position: absolute;
        transform: scale(2);
        opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
        cursor: pointer;
    }

</style>
<body>
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Profile</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>

    <div class="panel panel-primary shadow p-3 mb-5 bg-body rounded">
        <div class="panel-heading">
            <h3 class="panel-title">User Details</h3>
        </div>


        <div class="panel-body">
            <!-- panel content start -->
            <div class="container">
                <section style="padding-bottom: 50px; padding-top: 50px;">
                    <div class="row">
                        <!-- start -->
                        <!-- USER PROFILE ROW STARTS-->
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <?php



                                ?>
                                <?php

                                $_SESSION["id"] = 1; // Fill session id with user's id to get user's data like name and image name
                                $sessionId = $_SESSION["id"];
                                $user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_user WHERE id = $sessionId"));
                                ?>
                                <!DOCTYPE html>
                                <html lang="en" dir="ltr">
                                <head>
                                    <meta charset="utf-8">
                                    <title>Update Image</title>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                </head>

                                <body>
                                <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                    <div class="upload">
                                        <img src="/src/pages/img/<?php echo $user['image']; ?>" id = "image">

                                        <div class="rightRound" id = "upload">
                                            <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
                                            <i class = "fa fa-camera"></i>
                                        </div>

                                        <div class="leftRound" id = "cancel" style = "display: none;">
                                            <i class = "fa fa-times"></i>
                                        </div>
                                        <div class="rightRound" id = "confirm" style = "display: none;">
                                            <input type="submit">
                                            <i class = "fa fa-check"></i>
                                        </div>
                                    </div>
                                </form>

                                <script type="text/javascript">
                                    document.getElementById("fileImg").onchange = function(){
                                        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

                                        document.getElementById("cancel").style.display = "block";
                                        document.getElementById("confirm").style.display = "block";

                                        document.getElementById("upload").style.display = "none";
                                    }

                                    var userImage = document.getElementById('image').src;
                                    document.getElementById("cancel").onclick = function(){
                                        document.getElementById("image").src = userImage; // Back to previous image

                                        document.getElementById("cancel").style.display = "none";
                                        document.getElementById("confirm").style.display = "none";

                                        document.getElementById("upload").style.display = "block";
                                    }
                                </script>

                                <?php
                                error_reporting(0);
                                ini_set('display_errors', 0);
                                if(isset($_FILES["fileImg"]["name"])){
                                    $id = $_POST["id"];

                                    $src = $_FILES["fileImg"];
                                    $imageName =  $_FILES["fileImg"]["name"];

                                    $target = "/src/pages/img/" . $imageName;

                                    move_uploaded_file($src, $target);

                                    $query = "UPDATE tb_user SET image = '$imageName' WHERE id = $id";
                                    mysqli_query($mysqli, $query);

                                    header("Location: index.php");
                                }
                                ?>
                                </body>
                                </html>
                                <div class="user-wrapper">
                                    <div class="description">
                                        <h4>Name</h4>
                                        <h5> <strong> Client </strong></h5>

                                        <hr />
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#doctorprofile"><a class="glyphicon glyphicon-edit" style="text-decoration: none;" href="?update=<?php echo $row['userID']; ?>" title="Edit">Update Profile</a></button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-9 col-sm-9  user-wrapper">
                                <div class="description">
                                    <h3> <?php echo $row["username"]; ?> </h3>
                                    <hr>

                                    <div class="panel panel-default">
                                        <div class="panel-body">

                                            <table class="table table-user-information" align="center">
                                                <tbody>
                                                <tr>
                                                    <td>User Name</td>
                                                    <td><?php echo $row["username"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>User ID</td>
                                                    <td><?php echo $row['userID']; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
}
}
}
?>







<div class="modal fade" id="doctorprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form start -->

                <form action="" method="post" >
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Doctor FullName</td>
                            <td><input type="text" name="dFullName" value="" id="dfullname" class="form-control input-lg" placeholder="Full Name" required /></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="modal-footer">
                        <button type="submit" class="btn" name="sub" id="sub" >Update</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>

                <!-- form end -->
            </div>

        </div>
    </div>
</div>
<br/><br/>
</div>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>
</html>
