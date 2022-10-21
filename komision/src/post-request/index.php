<div class="modal fade" id="post-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Post a Komision!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <!--dito kervs-->
                <div class="flex-row" xmlns="http://www.w3.org/1999/html">
                    <div class="my-2 justify-content-center align-items-center">
                        Requirement info:<br>
                        <textarea class="inputRequest" id="reqDesc" cols="60" rows="4" style="width:
                        300px; height: 90px;
                        text-overflow: clip ;
                        color:black;
                        resize: none" placeholder="what's your requirement?" onclick="editClick(id)"
                                  onfocusout="resetClick(id,'what\'s your requirement?')"
                        ></textarea>
                    </div>
                    <div class="my-2">
                        Price:<br>
                        <input class="inputRequest" type="number"
                               id="reqPrice" style="width: 300px;height: 30px; color: black; resize: none" onclick="editClick(id)"
                               onfocusout="resetClick(id,'what\'s your budget?')"
                               placeholder=
                               "what's your budget?">
                    </div>
                    <div class="my-2">
                        Date & Time of Deadline:<br>
                        <div class="flex justify-content-start" style="width: 300px">
                            <input type="text" onfocus="(this.type='date')" onfocusout="(this.type ='text')" id="deadline" placeholder="due date"
                                   style="width:180px"><input type="text" onfocus="(this.type='time')" onfocusout="(this.type ='text')" id="timeDl"
                                                              placeholder="time"
                                                              style="width: 120px">
                        </div>
                    </div>
                    <div class="my-2">
                        <button type="button" onclick="submitReq()">
                            Post it!
                        </button>
                    </div>


                    <div class="send"></div
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</div>

<script>
    console.log("postreq loaded");
    let selectDesc = $("#reqDesc")
    let selectPrice = $("#reqPrice")
    let selectDate = $("#deadline")
    let selectTime = $("#timeDl");

    function submitReq() {
        let desc = selectDesc.val();
        let price = selectPrice.val();
        let date = selectDate.val();
        let time = selectTime.val();
        let deadline = date + " " + time;
        console.log(deadline);
        if (desc && price && date && time !== '') {
            $(".send").load('/komision/src/post-request/post-request-query.php', {
                desc    : desc,
                price   : price,
                deadline: deadline,
            })
            $('#post-model').modal('toggle')
        }
        $("#postlist").load('/komision/src/post-request/post-display.php', {})
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
