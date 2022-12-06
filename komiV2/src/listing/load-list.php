<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__.'/../../components/icon.php';
require_once __DIR__ . '/../../config/config.php';
$userType = $_SESSION['userType'];
$postRequestQuery = "SELECT Description, price, deadline, postrequest.date_created, username, postID,u.userID FROM postrequest left join users u on u.userID = postrequest.userID left join acceptrequest a on postrequest.postID = a.postRequestID where ac_req_id is NULL order by postID desc ";
$postRequestResult = $mysqli->query($postRequestQuery);
$postRequestRow = mysqli_fetch_assoc($postRequestResult);
if($userType == 0){
    $display = "d-none";
}else{
    $display = 'd-block';
}
foreach ($postRequestResult as $postRequestRow) {
    $id = $postRequestRow['postID'];
    $price = $postRequestRow['price'];
    $currentID = $postRequestRow['userID'];
    echo "<div class=' border-top border-bottom post-border px-3 py-2 ' id='post$id'>";
    echo "<div class='d-flex align-items-start'>";
        echo "<div class='d-flex align-items-center justify-content-center m-1 rounded-pill active' style='min-width: 3rem; min-height: 3rem; '>";
        $img = getImg($currentID, '2.5em');
        $username = $postRequestRow['username'] ;
        echo $img;
        echo "</div>";
        echo "<div>";
        echo "<div class='usernames'>@" . $username. "</div>";
        echo "Description: " . $postRequestRow['Description'];
        echo "<br>Price: PHP " . $price;
        echo "<br>Deadline: " . $postRequestRow['deadline'];
        echo "<br> Posted on: " . $postRequestRow['date_created'];
        echo "<div class='flInteract chat-link' style='width: fit-content;'>
                <input type='button' id='accept$id' class='btn-primary $display accept my-2 btn p-1' value='Accept Komision' onclick='acceptList($id, $price, $currentID, `$username`)'>
                </div>
                ";
        echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
<script>
    console.log("loaded");
</script>
