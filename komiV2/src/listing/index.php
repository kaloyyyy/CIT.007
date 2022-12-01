<div class="col-6   p-0 m-0 post-border border-left border-right">
    <?php
    require_once __DIR__ . '/../../components/header.php';
    ?>
    <div id="postlist" class="translucent ">

    </div>
</div>

<script>
    $('#postlist').load('/src/listing/load-list.php')

    function acceptList(id,price) {
        console.log(id);
        $('#post'+id).load('src/listing/accept-list.php',{
            id: id,
            price: price,
        })
        $('#numberOfKomi').load('src/listing/count.php')
    }
</script>
