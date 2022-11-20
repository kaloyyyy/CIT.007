<?php
// Include config file
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/meta.php";


require_once __DIR__ . '/../../components/waves.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient Profile</title>
    <style>
        .wrapper {
            width: 420px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center">
    <div class="wrapper">
        <h2>Create a Patient Profile</h2>
        <p>Please fill this form to create a new patient profile.</p>
    </div>
    <div class="wrapper form-bg rounded ">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username"
                   class="form-control "
                   value="">
            <span class="invalid-feedback d-block" id="username_err"></span>
        </div>

        <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" name="firstname"
                   class="form-control "
                   value="">
            <span class="invalid-feedback d-block" id="fname_err"></span>
        </div>

        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname"
                   class="form-control "
                   value="">
            <span class="invalid-feedback d-block" id="sname_err"></span>
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight" id="weight"
                   class="form-control "
                   value="">
            <span class="invalid-feedback d-block" id="weight_err"></span></div>

        <div class="form-group">
            <label for="height">Height</label>
            <input type="number" name="height" id="height"
                   class="form-control"
                   value="">
            <span class="invalid-feedback d-block" id="height_err"></span>
        </div>

        <div class="form-group">

            <label class="mr-3 mb-0">Sex</label>
            <input type="radio" name="sex" value="male"> Male
            <input type="radio" name="sex" value="female" class="ml-3"> Female
            <span class="invalid-feedback d-block" id="sex_err"></span>
        </div>
        <div class="form-group mb-0">
            <input type="submit" class="btn btn-primary" value="Submit" onclick="addProfile()">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset" onclick="reset()">
        </div>
    </div>
</div>
<div id="success" class="d-none"></div>
</body>
<script>
    function reset() {
        $('input').val('')
        $("input[type='submit']").val('Submit')
        $("input[type='reset']").val('Reset')
    }

    function addProfile() {
        let checkCount = 0;
        $('.invalid-feedback').text('')
        let username = $("input[name='username']").val();
        let fname = $("input[name='firstname']").val();
        let sname = $("input[name='surname']").val();
        let weight = $("input[name='weight']").val();
        let height = $("input[name='height']").val();
        let sex = $("input[type='radio']:checked").val()

        if (username.trim() === '') {
            $('#username_err').text("Please input a valid username")
        } else if (!(/^[a-zA-Z0-9_]+$/.test(username.value))) {
            $('#username_err').text("Username can only contain letters, numbers, and underscores.")
        } else {
            checkCount++
        }
        if (fname.trim() === '') {
            $('#fname_err').text("Please input a valid First name")
        } else {
            checkCount++
        }
        if (sname.trim() === '') {
            $('#sname_err').text("Please input a valid Surname")
        } else {
            checkCount++
        }
        if (weight.trim() === '') {
            $('#weight_err').text("Please input a weight")
        } else {
            checkCount++
        }

        if (height.trim() === '') {
            $('#height_err').text("Please input a height")
        } else {
            checkCount++
        }
        if (sex === undefined) {
            $('#sex_err').text("Please select a sex")
        } else {
            checkCount++
        }

        if (checkCount === 6) {

            $("#success").load('/src/addProfile/add.php', {
                username: username,
                fname   : fname,
                sname   : sname,
                weight  : weight,
                height  : height,
                sex     : sex,
            })
        }
    }
</script>
</html>