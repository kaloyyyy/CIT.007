<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/background.php';

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

// Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

// Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE userID = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                header("location: /pages/account/home.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

// Close connection
    $mysqli->close();
}
?>

<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>HOME</title>
</head>
<body>
<div class="body h-100 w-100 d-flex container flex-column">
    <div class="justify-content-center align-items-center text-center p-0">
        <h1 class=" rounded p-0"> Welcome to My MD: the perfect solution for doctor appointment
            scheduling!
        </h1>
    </div>
    <div class="text-center">
        <input type="button" value="reset password" id="reset" class="btn-warning btn text-white" onclick="reset()">
    </div>
    <div class="d-flex w-100 justify-content-center ">
        <div class="wrapper d-none" id="resetDiv">
            <h2>Reset Password</h2>
            <p>Please fill out this form to reset your password.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password"
                           class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>"
                           value="<?php echo $new_password; ?>">
                    <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password"
                           class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a class="btn btn-link ml-2" id="cancel" onclick="cancel()">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script>
    function reset() {
        let reset = $('#resetDiv')
        let btn = $('#reset')
        reset.removeClass('d-none');
        btn.addClass('d-none')
    }

    function cancel() {
        let reset = $('#resetDiv')
        let btn = $('#reset')
        reset.addClass('d-none');
        btn.removeClass('d-none')
    }
</script>
</html>
