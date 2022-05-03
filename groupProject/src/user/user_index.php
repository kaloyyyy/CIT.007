<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../../config/meta.php'; ?>
    <meta charset="UTF-8">
    <title>Komi-sion</title>
</head>
<body>
<?php include_once __DIR__ . '/../../public/header.php' ?>
<main>
    <div class="flex">
        <div class="wrapper">
            <div class="welcome"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></div>
            <div class="flex user-button">
                <div class="btn btn-warning"><a href="reset-password.php">Reset Password</a></div>
                <div class="btn btn-danger"><a href="logout.php">Sign Out</a></div>
            </div>

            <br>
            <?php date_default_timezone_set("Asia/Manila"); ?>
        </div>
    </div>
    <div class="chat-display">
        <ul>
            <?php
            $userID = require __DIR__ . '/../convo-query/user-query.php';
            $convoQue = "select * from convo where userID = $userID";
            $convoRes = mysqli_query($mysqli, $convoQue);
            $convoRow = mysqli_fetch_assoc($convoRes);
            foreach ($convoRes as $convoRow) {
                $convoID = $convoRow['convoID'];
                echo "<li>";
                $modID = $convoRow['modID'];
                $modQue = "select * from mods where modID = $modID";
                $modRes = mysqli_query($mysqli, $modQue);
                $modRow = mysqli_fetch_assoc($modRes);
                $modUsername = $modRow['modUsername'];
                if (isset($_GET['mod'])) {
                    $modID = $modRow['modID'];
                    if ($modID == $_GET['mod']) {
                        echo "<a href='/groupProject/src/user/user_index.php?mod=$modID' class='current-chat'>" . $modUsername . "</a><br>";
                    } else {
                        echo "<a href='/groupProject/src/user/user_index.php?mod=$modID'>" . $modUsername . "</a><br>";
                    }
                } else {
                    echo "<a href='/groupProject/src/user/user_index.php?mod=$modID'>" . $modUsername . "</a><br>";
                }
                echo "</li>";
            }
            echo "</ul>";
            ?>
            <div class="chat-box">
                <div id="chat-refresh">
                    <div id="active"><?php $modID = $_GET['mod'];
                        echo $modID ?>
                    </div>
                </div>
                <div class="send-section">
                    <div class=" chat-form">
                        <input type="text" name="chat" class="chat-input" id="chat-message">
                        <button name="send" id="chat-send" onclick="chatClick()"
                                class="button-send-chat fa-solid fa-circle-chevron-right send-chat">
                    </div>
                </div>
            </div>
    </div>
    <div id="trychat">

    </div>
    <script>
        let testCount = 0;
        let modID = $("#active").text();
        function chatClick() {
            let chat = $('#chat-message').val();
            console.log(chat);
            $('#trychat').load("/groupProject/src/convo-query/chat-insert.php", {chat: chat, modID: modID});
            $('#chat-message').val("");
        }

        console.log("yes");
        console.log(modID);
        //chatList.php - list all chats and messages.
        $("#chat-refresh").load("chatList.php", {testNewCount: testCount, modID: modID});
        console.log("log");
    </script>

</main>
</body>
<script>

    //script for polling then calls the chatList.php
    testCount = 1;
    (function loop() {
        setTimeout(function () {
            // Your logic here
            testCount = testCount + 1;
            console.log("log");
            $("#chat-refresh").load("chatList.php", {testNewCount: testCount, modID: modID});
            loop();
        }, 1500);
    })();
</script>
</html>
