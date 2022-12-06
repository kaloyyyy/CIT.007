<div class="col-6   p-0 m-0 post-border border-left border-right">
    <?php
    require_once __DIR__ . '/../../components/header.php';
    ?>
    <div id="postList" class="translucent ">
        <?php
        require 'load-list.php';
        ?>
    </div>
</div>

<script>


    function acceptList(id, price, userID, username) {
        console.log(username);
        $('#post' + id).load('src/listing/accept-list.php', {
            userID  : userID,
            id      : id,
            price   : price,
            username: username

        })
        $('#numberOfKomi').load('src/listing/count.php')
    }
</script>
