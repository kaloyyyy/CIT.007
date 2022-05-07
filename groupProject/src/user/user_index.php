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
        <ul id="convo-refresh">

        </ul>
        <div class="chat-bg">
            <div class="chat-bx">
                <div id="chat-refresh">
                    <div id="active"><?php $chatID = $_GET['chatID'];
                        echo $chatID ?>
                    </div>
                </div>
                <div class="send-section">
                    <div class=" chat-form">
                        <input type="text" name="chat" class="chat-input" id="chat-message" onkeypress="chatEnter()">
                        <button name="send" id="chat-send" onclick="chatClick()"
                                class="button-send-chat fa-solid fa-circle-chevron-right send-chat">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="trychat">

    </div>
    <script>
        let testCount = 0;
        let chatID = $("#active").text();

        function chatEnter() {
            if (event.keyCode === 13 && event.shiftKey) {

            } else if (event.keyCode === 13) {
                chatClick();
            }
        }

        function chatClick() {
            let chat = $('#chat-message').val();
            console.log(chat);
            $('#trychat').load("/groupProject/src/convo-query/chat-insert.php", {chat: chat, chatID: chatID});
            $('#chat-message').val("");
            $('#chat-refresh').scrollIntoView(false);
        }

        console.log("yes");
        console.log(chatID);
        //chatList.php - list all chats and messages.
        $("#convo-refresh").load("/groupProject/src/convo-query/convoList.php", {
            testNewCount: testCount,

            chatID: chatID
        });
        $("#chat-refresh").load("/groupProject/src/convo-query/chatList.php", {
            testNewCount: testCount,
            chatID: chatID,
        });
        console.log("log");

        $("#chat-message").keyup(function (event) {
            if (event.keyCode === 13) {
                chatClick();
            }
        });
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
            $("#convo-refresh").load("/groupProject/src/convo-query/convoList.php", {testNewCount: testCount, chatID: chatID});
            $("#chat-refresh").load("/groupProject/src/convo-query/chatList.php", {testNewCount: testCount, chatID: chatID});
            loop();
        }, 1500);
    })();
</script>
</html>
