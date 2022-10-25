<?php
// Initialize the session
chdir(dirname(__DIR__));

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once __DIR__ . "/../../config/config.php";

// Define variables and initialize with empty values
$username = $password = $modKey = "";
$username_err = $password_err = $login_err = "";
$modKey_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    // Check if modKey is empty
    //$modKey = trim($_POST["modKey"]);
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement

        $sql = "SELECT userID, username, password, userType FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password, $accType);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session


                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            /*                            if ($modKey == 'IamMod'){
                                                            $_SESSION["mod"] = true;
                                                            $_SESSION["tableAccount"] = 'users';
                                                            $_SESSION["idFind"] = 'userID';
                                                            $_SESSION["myTable"] = 'mods';
                                                            $_SESSION["myCol"] = 'modID';
                                                        }else{
                                                            $_SESSION["mod"] = false;
                                                            $_SESSION["tableAccount"] = 'users';
                                                            $_SESSION["idFind"] = 'userID_2';
                                                            $_SESSION["myTable"] = 'users';
                                                            $_SESSION["myCol"] = 'userID';
                                                        }*/
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["accType"] = $accType;

                            // Redirect user to welcome page
                            echo "<script> window.location.reload();</script>";
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
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

<div class="modal fade" id="login-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p>Please fill in your credentials to login.</p>

                        <?php
                        if (!empty($login_err)) {
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username"
                                       class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                       class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group my-1">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                Don't have an account?
                <button type="button" class="btn" data-toggle='modal' data-target='#register-model'><a href="<?php echo
                    '/soda/src/users/register.php' ?>">Sign up
                        now</a></button>
            </div>
        </div>
    </div>
</div>
