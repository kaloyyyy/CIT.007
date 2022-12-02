<div class="col-4 h-100 border-right post-border p-0">
    <?php

    require_once __DIR__ . '/../../components/header.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    $activeConvo = $_GET['convo'] ?? '';
    require_once __DIR__.'/../../config/config.php';
    require_once __DIR__.'/../../components/icon.php';
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
        if($convoID == $activeConvo){
            $activeUser=  $rows['username'];
        }
        $currentID = $rows['userID'];
        $lastChatQuery = "select message from chat where convID = $convoID order by created_at desc ";
        $lastChatRes = $mysqli->query($lastChatQuery);
        $lastChatRow = mysqli_fetch_array($lastChatRes);
        echo "<a class='btn btn-chat text-left w-100 chat-link m-0 p-1' id='$convoID' href='/?page=Messages&convo=$convoID'><div class=' p-0 m-0'>";
            echo "<div class='d-flex align-items-center'>";
                echo "<div class='d-flex align-items-center justify-content-center m-1 rounded-pill active' style='min-width: 3rem; min-height: 3rem'>";
                $img = getImg($currentID, '2.5em');
                echo $img;
                echo "</div>";
                echo "<div class='d-block'  style='width: 100%'>";
                    echo "<div class='' style='font-size: 1.1rem'>";
                        echo $rows['username'];
                    echo "</div>";
                    echo "<div class='text-secondary text-truncate' style='min-width: 0; max-width: 80%'>";
                        echo $lastChatRow[0];
                    echo "</div>";
                echo "</div>";
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
