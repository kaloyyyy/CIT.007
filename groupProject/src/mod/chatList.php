<div class="user-convo" xmlns="http://www.w3.org/1999/html">
    <?php
    require_once __DIR__ . '/../../config/config.php';
    session_start();
    $testNewCount = $_POST['testNewCount'];
    $userNow = $_SESSION['id'];
    $userName = $_SESSION['username'];
    $currID = $_POST['chatID'];
    /**
     * @param mixed $chatRow
     * @param mixed $userName
     * @param mixed $modUsername
     * @return void
     */
    function printChat(mixed $chatRow, mixed $userName, mixed $modUsername): void {
        if ($chatRow['sender'] == 0) {
            echo "</li>";
            echo "<li class = 'no-style'>";
            echo "----------" . $chatRow['created_at'] . "----------";
            echo "<h6 class='username-chat'>" . $userName . "</h6>" . $chatRow['chatMessage'] . "<br>";
        } else {
            echo "<li class = 'no-style'>";
            echo "----------" . $chatRow['created_at'] . "----------";
            echo "<h6 class='modUsername-chat'>" . $modUsername . "</h6>" . $chatRow['chatMessage'] . "<br>";
        }
    }

    if (is_numeric($currID)) {
        $modQue = "select * from mods where modID = $currID";
        $modRes = $mysqli->query($modQue);
        $modRow = mysqli_fetch_assoc($modRes);
        $modUsername = $modRow['modUsername'];
        $convoQue = "select * from convo where userID = $userNow and modID = $currID";
        $convoRes = mysqli_query($mysqli, $convoQue);
        $convoRow = mysqli_fetch_assoc($convoRes);

        if (mysqli_num_rows($convoRes) > 0) {
            $convoID = $convoRow['convoID'];
            $chatQue = "select * from chat where convID = $convoID";
            $chatRes = mysqli_query($mysqli, $chatQue);
            $chatRow = mysqli_fetch_assoc($chatRes);
            $previousSender = null;
            echo "<div class='chat-box'><ul>";
            if (mysqli_num_rows($chatRes) > 0) {
                foreach ($chatRes as $chatRow) {
                    if ($chatRow['sender'] == $previousSender) {
                        echo $chatRow['chatMessage'] . "<br>";
                    } else {
                        printChat($chatRow, $userName, $modUsername);
                    }
                    $previousSender = $chatRow['sender'];
                }
            }
        } else {
            $newConvo = "INSERT INTO convo (`convoID`, `userID`, `modID`) VALUES (NULL, $userID, $modID)";
            $mysqli->query($newConvo);
        }
    } else {
        echo "<div class='chat-box'>click a moderator to start chat</div>";
    }
    ?>
    </ul>
</div>
</div>
