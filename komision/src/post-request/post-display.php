<div id="postlist">
    <?php
    require_once __DIR__ . '/../../config/config.php';

    $postRequestQuery = "SELECT * FROM postrequest join users u on u.userID = postrequest.userID order by postID desc ";
    $postRequestResult = $mysqli->query($postRequestQuery);
    $postRequestRow = mysqli_fetch_assoc($postRequestResult);

    foreach ($postRequestResult as $postRequestRow) {
        echo "<div class=' border-top border-bottom post-border px-3 py-2'>";
        echo "<div class='usernames'>@" . $postRequestRow['username'] . "</div>";
        echo "Description: " . $postRequestRow['Description'];
        echo "<br>price: PHP " . $postRequestRow['price'];
        echo "<br>deadline: " . $postRequestRow['deadline'];
        echo "<br> posted on " . $postRequestRow['date_created'];
        echo "</div>";
    }
    ?>
</div>
