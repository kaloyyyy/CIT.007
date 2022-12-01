<div class="col-4 h-100 border-right post-border p-0">
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $activeConvo = $_GET['convo'] ?? '';
    require_once __DIR__.'/../../config/config.php';
    $id = $_SESSION['id'];
    $accType = $_SESSION['userType'];
    if ($accType == 0) {
        $myType = 'userID';
        $conversationQuery = "select * from convo left join freelancers f on f.freelancerID = convo.fl_userID left join users u on u.userID = f.freelancerID where convo.userID = $id";
    } else {
        $myType='fl_userID';
        $conversationQuery = "select * from convo left join users u on u.userID = convo.userID where convo.fl_userID = $id";

    }
    $conversationRes = $mysqli->query($conversationQuery);
    foreach ($conversationRes as $rows){
        $convoID = $rows['convoID'];
        $lastChatQuery = "select message from chat where convID = $convoID";
        $lastChatRes = $mysqli->query($lastChatQuery);
        $lastChatRow = mysqli_fetch_array($lastChatRes);
        echo "<a class='btn btn-chat btn-sm text-left w-100' id='$convoID' href='/?page=Messages&convo=$convoID'><div class=' p-0 m-0'>";
        echo "<div class='' style='font-size: 1.1rem'>";
        echo $rows['username'];
        echo "</div>";
        echo "<div class='text-secondary text-truncate'>";
        echo $lastChatRow[0];
        echo "</div>";
        echo "</div></a>";
    }
    ?>
</div>
<script>
    let activeId = '<?php echo $activeConvo?>';
    let chat = $('#'+activeId);
    chat.addClass('active');
</script>
