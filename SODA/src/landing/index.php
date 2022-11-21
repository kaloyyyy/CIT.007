<br>
welcome to soda<br>

<a href="?page=user">get started</a>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo "logged in";
}