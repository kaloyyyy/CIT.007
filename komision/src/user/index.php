<?php
// Initialize the session
session_start();

chdir(dirname(__DIR__));

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
        <div class='div-commission'>
            <div <?php /*if (!$_SESSION['mod']) {
                echo "class ='comm-fit' id = 'commissions'";
            } else {
                echo "class ='comm-limit' id = 'commissions'";
            }*/ ?>>

            </div>
            <?php
            /*            if ($_SESSION['mod']) {
                            if (isset($_GET["chatID"])) {
                                $currentChat = htmlspecialchars($_GET["chatID"]);
                                require_once __DIR__ . "/../../config/config.php";
                                $connectQue = "select * from users where userID = $currentChat";
                                $connectRes = $mysqli->query($connectQue);
                                $connectRow = mysqli_fetch_assoc($connectRes);
                                $connectName = $connectRow['username'];

                                echo "<div id='addComm'>
                                        new commission for <span class='pink' >$connectName</span><br>
                                        enter description <br>
                                        <textarea type='text' name='description' id='commDesc' cols='40' rows='5'></textarea> <br>
                                        enter price <br>
                                        <input type='number' name='price' id='commPrice'><br>
                                        <div id='sendComm'  onclick='commClick()'>
                                        submit
                                        <button name='commSend' id='comm-send' class='button-send-chat fa-solid fa-circle-chevron-right send-comm'>
                                        </div>
                                    </div>";
                                $mysqli->close();
                            } else {
                                echo "<div id='addComm' class='flex'>
                                    <div>select a client to add commissions
                                    </div>";
                                echo " </div > ";
                            }
                        }
                        */ ?>
        </div>

    </div>

    <div id="trychat">
    </div>
    <script>
        let testCount = 0;
        let chatID = $("#active").text();
        $("#convo-refresh").load("/komision/src/convo/convo-list.php", {
            testNewCount: testCount,
            chatID      : chatID
        });
        $("#commissions").load("/komision/src/convo-query/commList.php");

        function loadText() {
            $("#chat-refresh").load("/komision/src/convo-query/chatList.php", {
                testNewCount: testCount,
                chatID      : chatID
            }).scrollTop(10000000);
        }


    </script>
</main>
</body>
<script>
    testCount = 1;

    $("#chat-refresh").load("/komision/src/convo-query/chatList.php", {
        testNewCount: testCount,
        chatID      : chatID
    });
    $("#chat-message").keypress(function (event) {
        if (event.keyCode === 13) {
            if ($("#chat-message").val === '') {

            } else {
                chatClick();
            }
        }
    });

    function chatClick() {
        let chat = $('#chat-message').val();
        if (chat.trim().length !== 0) {
            console.log(chat);
            $('#trychat').load("/komision/src/convo-query/chat-insert.php", {chat: chat, chatID: chatID});
            $('#chat-message').val("");
            loadText();
            setTimeout(loadText, 300);
        }
    }

    function commClick() {
        let commDesc = $('#commDesc').val();
        let price = $('#commPrice').val();
        console.log("commclick");
        $('#trychat').load("/komision/src/convo-query/comm-insert.php", {commDesc: commDesc, price: price, chatID: chatID});
        $('#commDesc').val("");
        $('#commPrice').val("");
        $("#commissions").load("/komision/src/convo-query/commList.php");
        loadText();
        setTimeout(loadText, 300);
    }

    function loadText() {
        $("#chat-refresh").load("/komision/src/convo-query/chatList.php", {
            testNewCount: testCount,
            chatID      : chatID
        }).scrollTop(10000000);
    }

    setTimeout(loadText, 300);

    (function loop() {
        setTimeout(function () {
            testCount = testCount + 1;
            console.log("log");
            $("#convo-refresh").load("/komision/src/convo-query/convoList.php", {
                testNewCount: testCount,
                chatID      : chatID
            });
            $("#chat-refresh").load("/komision/src/convo-query/chatList.php", {
                testNewCount: testCount,
                chatID      : chatID
            });
            $("#commissions").load("/komision/src/convo-query/commList.php");
            loop();
        }, 1000);
    })();
</script>
</html>