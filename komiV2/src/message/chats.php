<div class=" h-100 container-fluid p-0 m-0">
    <div class="container flex-column px-0 ">
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
        require_once __DIR__ . '/../../config/config.php';
        $username = $_SESSION['username'];
        $userID = $_SESSION['id'];
        $chatID = $_POST['chatID'];
        $accType = $_SESSION['userType'];
        echo "<div class=' flex-column d-flex' style='height: inherit; width: 100%'>";
        if ($_POST['chatID'] !== null) {
            $currentChat = $_POST['chatID'];
            if (is_numeric($currentChat)) {
                $chatsMessagesQue = "SELECT * FROM convo join chat c on convo.convoID = c.convID join freelancers f on f.freelancerID = convo.fl_userID join users u on u.userID = f.freelancerID where convo.convoID = $chatID order by c.created_at ASC ";
                $chatsMessagesResult = $mysqli->query($chatsMessagesQue);
                $chatsMessagesRow = mysqli_fetch_assoc($chatsMessagesResult);
                $previousSender = null;
                foreach ($chatsMessagesResult as $chats) {
                    $message = $chats['message'];
                    $sentBy = $chats['sender'];
                    if ($sentBy == $accType) {
                        $senderName = $username;
                    } else {
                        $senderName = $chats['username'];
                    }
                    if ($previousSender == $sentBy) {
                        $newChatSection = false;
                    } else {
                        $newChatSection = true;
                    }
                    $previousSender = $sentBy;
                    printChat($message, $senderName, $sentBy, $newChatSection);
                }
            }
        }
        echo "</div>";
        function printChat($message, $senderName, $sentBy, $join): void
        {
            $accType = $_SESSION['userType'];
            if ($sentBy == $accType) {
                $bgcolor = 'bg-primary';
                echo "
            <div class='d-flex container-fluid flex-column justify-content-end align-items-end px-1'>
            ";
            } else {
                $bgcolor = 'bg-secondary';
                echo "<div class='d-flex flex-column container-fluid justify-content-start align-items-start px-1'>
            ";
            }
            if ($join) {
                echo "<span class='text-secondary'>$senderName</span>";
                $marginY = '';
            } else {
                $marginY = '';
            }
            echo "
            <div class='card  px-1 py-1 $bgcolor $marginY' style='width: fit-content; max-width: 69%'>
                $message
            </div>
        </div>
    ";

        }

        ?>
    </div>
</div>