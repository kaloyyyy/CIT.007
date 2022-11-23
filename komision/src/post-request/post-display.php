<div id="postlist">
    <?php
    require_once __DIR__ . '/../../config/config.php';

    $postRequestQuery = "SELECT * FROM postrequest join users u on u.userID = postrequest.userID order by postID desc ";
    $postRequestResult = $mysqli->query($postRequestQuery);
    $postRequestRow = mysqli_fetch_assoc($postRequestResult);

    foreach ($postRequestResult as $postRequestRow) {
        $id = $postRequestRow['postID'];
        echo "<div class=' border-top border-bottom post-border px-3 py-2 ' id='post$id' onclick='flClick($id)'>";
        echo "<div class='usernames'>@" . $postRequestRow['username'] . "</div>";
        echo "Description: " . $postRequestRow['Description'];
        echo "<br>price: PHP " . $postRequestRow['price'];
        echo "<br>deadline: " . $postRequestRow['deadline'];
        echo "<br> posted on " . $postRequestRow['date_created'];
        echo "<div class='flInteract'>
    <input type='button' id='accept$id' class='btn-primary d-none accept' value='accept commission'>
</div>
";
        echo "</div>";

    }
    ?>
</div>
<script>
    function flClick(id){
        $('.accept').addClass('d-none')
        $('#accept'+id).removeClass('d-none')
    }
</script>
