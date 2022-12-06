<div class="col-6  post-border border-left border-right  p-0 m-0 ">

    <div class="container p-0 d-flex border-top post-border translucent" style="height: 100vh">
        <?php
        require_once __DIR__ . '/../../components/icon.php';
        if (isset($_GET['convo'])) {
            $activeID = $_GET['convo'];
        }
        require_once __DIR__ . '/conversations.php';
        ?>
        <div class="col-8 d-flex flex-column message-list py-2 p-0 post-border border-left m-0" id="col-message"
             style="height:
        100vh">
            <?php
            require_once __DIR__ . '/chat-header.php';
            ?>
            <div id="message-list" class="d-flex my-2" style="width: 100%;">
                <?php
                if (!isset($_GET['convo'])) {
                    echo "<div class='d-flex justify-content-center m-5   p-4 flex-column'>";
                    echo "<h3>";
                    echo "Select a Conversation";
                    echo "</h3>";
                    echo "<p>";
                    echo "Choose from your existing conversations, start a new one, or just keep looking around.";
                    echo "</p>";
                    echo "</div>";
                }
                ?>
            </div>

            <div class="<?php
            if (isset($_GET['convo'])) {
                echo 'd-flex';
            } else {
                echo 'd-none';
            }
            ?> p-0 m-0 " style="position: sticky; bottom: 0">
                <input type="text" id="message" onkeypress="chatEnter()" class="dark-bg border-0 px-2 py-1"
                       placeholder="Type here to chat..."
                       style="width:
                90%;
                 color: white">
                <a class="btn send py-1 px-0 m-0 chat-link" onclick="sendChat()" style="width: 10%">Send</a>
            </div>
        </div>
    </div>
    <div id="try-chat"></div>
</div>

<script>
    function chatEnter() {
        $("#message").keypress(function (event) {
            if (event.keyCode === 13) {
                if ($("#chat-message").val === '') {

                } else {
                    sendChat();
                }
            }
            console.log("enter");
        });
    }


    let convoID = '<?php echo $activeID; ?>'


    function loadText() {
        $("#message-list").load("/src/message/chats.php", {
            chatID: convoID
        }).scrollTop(1000000);
    }

    loadText()
    setTimeout(loadText, 300);

    function sendChat() {
        let message = $('#message').val()
        console.log(message);
        if (message.trim().length !== 0) {
            $('#try-chat').load("/src/message/insert.php", {chat: message, chatID: convoID});
            $('#message').val("");
            loadText();
            setTimeout(loadText, 300);
        }
    }


    (function loop() {
        setTimeout(function () {
            $("#chat-refresh").load("/src/message/chats.php", {
                chatID: convoID
            });
            loop();
        }, 1000);
    })();
</script>
