<div class="container flex-column ">
    <?php
    session_start();
    require_once __DIR__ . '/../../config/config.php';
    $username = $_SESSION['username'];
    $userID = $_SESSION['id'];
    echo "<div class=' flex-column d-flex align-items-end' style='height: inherit'>";
    if ($_POST['chatID'] !== null) {
        $currentChat = $_POST['chatID'];
        if (is_numeric($currentChat)) {
            $chatsMessagesQue = "SELECT * FROM convo join chat c on convo.convoID = c.convID where userID = $userID && convo.fl_userID = $currentChat";
            $chatsMessagesResult = $mysqli->query($chatsMessagesQue);
            $chatsMessagesRow = mysqli_fetch_assoc($chatsMessagesResult);
            $previousSender = null;
            foreach ($chatsMessagesResult as $chats) {
                $message = $chats['message'];
                printChat($message, "yes", '0');
            }
        }
    }
    echo "</div>";
    function printChat($message, $senderName, $sentBy): void
    {
        echo "
    <div class='card text-primary' style='width: fit-content'>
        $message
    </div>
    ";
    }

    ?>
</div>
