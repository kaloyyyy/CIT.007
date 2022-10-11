<?php
session_start();
chdir(dirname(__DIR__));
include __DIR__ . '/../../config/meta.php';
include __DIR__ . '/../../public/header.php';
?>
    <div class="flex-row" style="width: 320px;height: auto;background: white; color: black" xmlns="http://www.w3.org/1999/html">
        Requirement info:
        <input class="inputRequest" id="reqDesc" style="width: 300px;height: 30px; color: black; resize: none" onclick="editClick(id)"
               onfocusout="resetClick(id,'what\'s your requirement?')"
               placeholder=
               "what's your requirement?">
        <br>
        Price:<br>
        <input class="inputRequest" type="number"
               id="reqPrice" style="width: 300px;height: 30px; color: black; resize: none" onclick="editClick(id)"
               onfocusout="resetClick(id,'what\'s your budget?')"
               placeholder=
               "what's your budget?">
        <br>
        Date & Time of Deadline:<br>
        <div class="flex justify-content-start" style="width: 300px">
            <input type="text" onfocus="(this.type='date')" onfocusout="(this.type ='text')" id="deadline" placeholder="due date" style="width:
            200px">
            <input type="text" onfocus="(this.type='time')"  onfocusout="(this.type ='text')" id="timeDl" placeholder="time" style="width: 100px">
        </div>

        <button type="button" onclick="submitReq()" style="background: pink">
            test
        </button>

        <div class="send"></div
    </div>

    <script>
        let selectDesc = $("#reqDesc")
        let selectPrice = $("#reqPrice")
        let selectDate = $("#deadline")
        let selectTime = $("#timeDl");

        function submitReq() {
            let desc = selectDesc.val();
            let price = selectPrice.val();
            let date = selectDate.val();
            let time = selectTime.val();
            let deadline = date + " " +time;
            console.log(deadline);
            if (desc && price && date && time !== '')
            $(".send").load('post-request-query.php', {
                desc    : desc,
                price   : price,
                deadline: deadline,
            })

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
