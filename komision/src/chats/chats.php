<?php
chdir(dirname(__DIR__));
require_once __DIR__ . "/../../config/config.php";
if (!isset($_SESSION['id'])) {
    session_start();
}
if (isset($_GET['chatID'])) {
    $currentchatID = $_GET['chatID'];
}

$currentUserId = $_SESSION['id'];
$currentUserType = $_SESSION['accType'];
$chatsQuery = "SELECT * FROM komision.convo join users u on convo.fl_userID = u.userID where convo.userID = $currentUserId";
$chatsResult = $mysqli->query($chatsQuery);
$chatsRow = mysqli_fetch_assoc($chatsResult);
?>

<div class="container-fluid p-0 w-auto ">
    <div class="row d-flex  g-0 align-items-center justify-content-evenly" >
        <div class="col-4 border-left post-border" style="height: 100vh">
            <div class="flex-row align-content-between  komi-header" style="text-align: center ; height: 5vh">
                <h5>
                    <?php
                    if (isset($currentPage)) {
                        echo $currentPage;
                    } else {
                        echo "Komi-sion";
                    }
                    ?>
                </h5>
            </div>

            <?php
            foreach ($chatsResult as $chatsRow) {
                $chatId = $chatsRow['convoID'];
                $connectID = $chatsRow['fl_userID'];
                if (isset($currentchatID)) {
                    if ($connectID == $currentchatID) {
                        $activeUsernameChat = $chatsRow['username'];
                    }
                }

                $connectUsername = $chatsRow['username'];
                echo "<a href='/komision/index.php/?page=Messages&chatID=$connectID'  >";
                echo "<li>";
                echo $connectUsername . "</li></a>";
            }
            ?>
        </div>
        <div class="col-8 message-list p-0 border-start post-border border-left border-right" id="message-list" style="height: 100vh">
            <div class="flex-row align-content-between navbar komi-header" style="height: 5vh">
                <h5>
                    <?php
                    if (isset($activeUsernameChat)) {
                        echo $activeUsernameChat;
                    }
                    ?>
                </h5>
            </div>
            <div id="msg-load">

                <div id="active" class="d-none">
                    <?php if (isset($_GET['chatID'])) {
                        $chatID = $_GET['chatID'];
                        echo $chatID;
                    }
                    ?>
                </div>
            </div>

        </div>


    </div>
</div>
<script>
    let msgLoad = $('#msg-load')
    let chatID = $('#active').text();
    msgLoad.load('/komision/src/chats/messages.php', {
        chatID: chatID
    })
    console.log(chatID)
</script>
