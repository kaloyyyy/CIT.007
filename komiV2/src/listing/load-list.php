<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
$userType = $_SESSION['userType'];
$postRequestQuery = "SELECT Description, price, deadline, postrequest.date_created, username, postID FROM postrequest left join users u on u.userID = postrequest.userID left join acceptrequest a on postrequest.postID = a.postRequestID where ac_req_id is NULL order by postID desc ";
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
    echo "<div class=' border-top border-bottom post-border px-3 py-2 translucent' id='post$id'>";
    echo "<div class='usernames'>@" . $postRequestRow['username'] . "</div>";
    echo "Description: " . $postRequestRow['Description'];
    echo "<br>price: PHP " . $price;
    echo "<br>deadline: " . $postRequestRow['deadline'];
    echo "<br> posted on: " . $postRequestRow['date_created'];
    echo "<div class='flInteract'>
            <input type='button' id='accept$id' class='btn-primary $display accept my-2 btn p-1' value='accept commission' onclick='acceptList($id, $price)'>
            </div>
            ";
    echo "</div>";
}
?>
<script>

</script>
