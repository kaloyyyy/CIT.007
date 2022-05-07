<div class="user-convo" xmlns="http://www.w3.org/1999/html">
    <?php
    require_once __DIR__ . '/../../config/config.php';
    session_start();
    $testNewCount = $_POST['testNewCount'];
    $currID = $_SESSION['id'];
    $tableFind = $_SESSION['tableAccount'];
    $idFind = $_SESSION['idFind'];
    $userName = $_SESSION['username'];
    $currentChat = $_POST['chatID'];

    if (is_numeric($currentChat)) {
        $connectQue = "select * from $tableFind where $idFind = $currentChat";
        $connectRes = $mysqli->query($connectQue);
        $connectRow = mysqli_fetch_assoc($connectRes);
        $username = $connectRow['username'];
        $convoQue = "select * from convo where userID = $currID and modID = $currentChat";
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
                        if ($chatRow['sender'] == 0) {
                            echo "</li>";
                            echo "<li class = 'no-style'>";
                            echo "----------" . $chatRow['created_at'] . "----------";
                            echo "<h6 class='username-chat'>" . $userName . "</h6>" . $chatRow['chatMessage'] . "<br>";
                        } else {
                            echo "<li class = 'no-style'>";
                            echo "----------" . $chatRow['created_at'] . "----------";
                            echo "<h6 class='modUsername-chat'>" . $username . "</h6>" . $chatRow['chatMessage'] . "<br>";
                        }
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
