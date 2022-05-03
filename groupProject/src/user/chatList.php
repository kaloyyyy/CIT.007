<div class="user-convo" xmlns="http://www.w3.org/1999/html">
    <?php
    session_start();
    $testNewCount = $_POST['testNewCount'];
    $userNow = require __DIR__ . '/../convo-query/user-query.php';
    $modID = $_POST['modID'];
    if (is_numeric($modID) == true) {
        $modQue = "select * from mods where modID = $modID";
        $modRes = mysqli_query($mysqli, $modQue);
        $modRow = mysqli_fetch_assoc($modRes);
        $modUsername = $modRow['modUsername'];
        $convoQue = "select * from convo where userID = $userID and modID = $modID";
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
                        if ($chatRow['sender'] == 0) {
                            echo $chatRow['chatMessage'] . "<br>";
                        } else {
                            echo $chatRow['chatMessage'] . "<br>";
                        }
                    } else {
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
                    $previousSender = $chatRow['sender'];
                }
            }
        } else {
            $newConvo = "INSERT INTO convo (`convoID`, `userID`, `modID`) VALUES (NULL, $userID, $modID)";
            $mysqli->query($newConvo);
        }
    } else {
        echo "<div class='chat-box'>click a moderator to start chat";
    }
    ?>
    </ul>

</div>
</div>
