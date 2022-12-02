<div class="col-6  post-border border-left border-right  p-0 m-0 ">

    <div class="container p-0 d-flex border-top post-border translucent" style="height: 100vh">
        <?php
        if(isset($_GET['convo'])){
            $activeID = $_GET['convo'];

        }
        require_once __DIR__.'/conversations.php';
        ?>
        <div class="col-8 d-flex flex-column message-list p-0 post-border border-left m-0" id="" style="height:
        99vh">
            <div class="d-flex flex-row navbar komi-header align-items-center py-2"
                 style="height: 2.5em">
                <h5 class="d-flex align-items-center " ">
                    <?php
                    if (isset($activeID)) {
                        echo $activeUser;
                    }
                    ?>
                </h5>
            </div>
            <div id="message-list" class="d-flex" style="width: 100%;">

            </div>

        </div>
    </div>

</div>

<script>
    let convoID = '<?php echo $activeID; ?>'

    $('#message-list').load('/src/message/chats.php',{
        chatID: convoID,
    })
</script>
