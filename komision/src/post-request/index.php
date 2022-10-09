<?php
session_start();
chdir(dirname(__DIR__));
include __DIR__ . '/../../config/meta.php';
include __DIR__ . '/../../public/header.php';
?>
    <div style="width: 220px;height: 30px;background: white" xmlns="http://www.w3.org/1999/html">
        <input class="inputRequest" id="reqDesc" style="width: 220px;height: 30px; color: black; resize: none" onclick="editClick(id)"
               onfocusout="resetClick(id,'what\'s your requirement?')"
               placeholder=
               "what's your requirement?">
        <input class="inputRequest" type="number"
               id="reqPrice" style="width: 220px;height: 30px; color: black; resize: none" onclick="editClick(id)"
               onfocusout="resetClick(id,'what\'s your budget?')"
               placeholder=
               "what's your budget?">
        <button type="button" onclick="submitReq()" style="background: white">
            test
        </button>

        <div class="send"></div>
    </div>

    <script>
        let selectDesc = $("#reqDesc")
        let selectPrice = $("#reqPrice")

        function submitReq() {
            let desc = selectDesc.val();
            let price = selectPrice.val();
            $(".send").load('post-request-query.php', {desc: desc, price: price})
            console.log('post')

        }



        function editClick(id) {
            console.log(id);
            let select = $("#" + id)
            select.attr("placeholder", "");
        }

        function resetClick(id, text) {
            let select = $("#" + id)
            select.attr("placeholder", text);
        }


    </script>
<?php
