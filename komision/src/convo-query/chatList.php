<div class="user-convo" xmlns="http://www.w3.org/1999/html">
    <?php
    require_once __DIR__ . '/../../config/config.php';
    session_start();
    $testNewCount = $_POST['testNewCount'];
    $currID = $_SESSION['id'];
    $userNameNow = $_SESSION['username'];
    $currentChat = $_POST['chatID'];

    function timedChat(mixed $chatRow, mixed $clientUser, mixed $modUser): void {
        echo "</li>";
        echo "<li class = 'no-style'>";
        echo "<center><span class='timestamp'>─────────────" . $chatRow['created_at'] . "─────────────</span></center>";
        if ($chatRow['sender'] == 0) {
            echo "<h6 class='username-chat name-chat'>" . $clientUser . "</h6>" . $chatRow['message'] . "<br>";
        } else {
            echo "<h6 class='modUsername-chat name-chat'>" . $modUser . "</h6>" . $chatRow['message'] . "<br>";
        }
    }

    if (is_numeric($currentChat)) {
        $connectQue = "select * from $tableFind where $idFind = $currentChat";
        $connectRes = $mysqli->query($connectQue);
        $connectRow = mysqli_fetch_assoc($connectRes);
        $connectName = $connectRow['username'];
        if ($_SESSION['mod']) {
            $clientUser = $connectName;
            $modUser = $userNameNow . "  (you)";
        } else {
            $modUser = $connectName;
            $clientUser = $userNameNow . "  (you)";
        }
        $convoQue = "select * from convo where $myCol = $currID and $idFind = $currentChat";
        $convoRes = $mysqli->query($convoQue);
        $convoRow = mysqli_fetch_assoc($convoRes);
        if (mysqli_num_rows($convoRes) > 0) {
            $convoID = $convoRow['convoID'];
            $chatQue = "select * from chat where convID = $convoID";
            $chatRes = mysqli_query($mysqli, $chatQue);
            $chatRow = mysqli_fetch_assoc($chatRes);
            $previousSender = null;
            echo "<div class='chat-box-block'><ul>";
            if (mysqli_num_rows($chatRes) > 0) {
                $consecutiveChat = 0;
                foreach ($chatRes as $chatRow) {
                    if ($consecutiveChat == 5) {
                        $consecutiveChat = 0;
                        timedChat($chatRow, $clientUser, $modUser);
                    } else if ($chatRow['sender'] == $previousSender) {
                        echo $chatRow['message'] . "<br>";
                        $consecutiveChat = $consecutiveChat + 1;
                    } else {
                        $consecutiveChat = 0;
                        timedChat($chatRow, $clientUser, $modUser);
                    }
                    $previousSender = $chatRow['sender'];
                }
            }
        }
    } else {
        echo "<div class='chat-box'>select a conversation</div>";
    }
    $mysqli->close();
    ?>
    </ul>
</div>
</div>
