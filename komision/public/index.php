<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    

</head>
<script>

$(document).ready(function(){
    
  $('#toggle') .one ("click", function(){
    $('.ftoggle').toggle ('normal');
    
    

  });
});
</script>






<body class=" darktheme ">
<div class="container ">
    <div class="">
        <div class="row justify-content-center">
            <div class="col-2 d-flex justify-content-end ">
                <?php include 'sidebar.php';

                ?>
            </div>
            <div class=" col-7 border-start post-border border-end p-0">
                <?php
                if (isset($_GET['page'])) {
                    $currentPage = $_GET['page'];
                }

                ?>
                <?php
                $sample = "<div class='border-top post-border border-bottom px-3 py-2'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class=' border-top border-bottom post-border px-3 py-2'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
                et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,
                quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
                qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum
                qui dolorem eum fugiat quo voluptas nulla pariatur?</div>";

                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'Messages') {
                        require __DIR__ . "/../src/chats/chats.php";
                    } else if ($_GET['page'] == 'Listings') {
                        require __DIR__ . "/../src/post-request/post-display.php";
                    } else {
                        include 'header.php';
                        echo $sample . $sample . $sample . $sample;
                    }
                } else {
                    include 'header.php';
<<<<<<< Updated upstream
                    echo "<div class=' border-top post-border border-bottom px-3 py-2'>
                            <div class='container d-flex justify-content-center'>
=======
                    echo "<div  class='border-top post-border border-bottom px-3 py-2'>
                            <div class='container d-flex justify-content-center' >
>>>>>>> Stashed changes
                            <div class='flex-row' xmlns=\"www.w3.org/1999/html\">
                            <div class='my-2 justify-content-center align-items-center'>
                           
                            

                        <div class='text-right'>
                        <button type='button' id ='backToggle' class='btn btn-outline-light ftoggle'><span class='bi bi-arrow-left' onClick='window.location.reload()';></span></button>
                            
                        </div>
                        Requirement info:<br>
<<<<<<< Updated upstream
                         <textarea class='form-control' id='toggle' aria-label='With textarea' style='width:
                        300px; height: 90px; text-overflow: clip; resize: none'; placeholder='Whats on your mind, User?' 
                        onfocus='$('#lowbox').show();'
                        onfocus='editClick(id)' onfocusout='resetClick(id,'Whats on your mind, User?')'></textarea>

                        </div>

                        <div id='lowbox' style='display:none'>
                          <div class='my-2'>
=======
                         <textarea  class='form-control' id='toggle' aria-label='With textarea' style='width:
                        300px; height: 90px; text-overflow: clip; resize: none'; placeholder='Whats on your mind, User?' onclick='editClick(id)'
                         onfocusout='resetClick (id,'Whats on your mind, User?')'></textarea>

                        </div>

                          <div class='my-2 '>
                     <div class='ftoggle'>
>>>>>>> Stashed changes
                        Price:<br>
                        </div>

                        <input class=' inputRequest ftoggle'  type='number'
                               id='reqPrice' style='width: 300px;height: 30px; color: black; resize: none' onclick='editClick(id)''
                               onfocusout='resetClick(id,'what\'s your budget?')'
                               placeholder='What is your budget?' >
                    </div>

                     <div class='my-2'>
                     <div class='ftoggle'>
                        Date & Time of Deadline:<br>
                        </div>
                        <div class='flex justify-content-start' style='width: 300px '>
                            <input class='ftoggle' type='text' onfocus='(this.type='date')' onfocusout='(this.type ='text')' id='deadline' placeholder='due date'
                                   style='width:180px'><input class='ftoggle'type='text' onfocus='(this.type='time')' onfocusout='(this.type ='text')' id='timeDl'
                                                              placeholder='time'
                                                              style='width: 120px'>
                        </div>
                    </div>
                    </div>
                    <div class=' border-top post-border px-3 py-3'>
                     <div class='my-2 text-right'>
                        <button type='button'  class = 'btn btn-outline-light ftoggle'  on click='submitReq()'>
                            Posts
                        </button>
                    </div>
                    </div>
                    </div>


                     </div>";

                    echo $sample . $sample;
                }

                ?>
            </div>
            <?php
            if (isset($_SESSION['id'])) {
                $username = $_SESSION['username'];
                echo "
                <div class='col-2 m-3 '>
                    <div class=' mb-4  position-fixed '><a class=' col-1 rounded-pill' id='user' href='#' data-toggle='modal' data-target='#logged-model'>
                        <i class='fa-regular fa-user'></i><span class='d-none ms-3 d-xxl-inline-block'>$username</span></a>
                    </div>
                </div>";
            } else {
                echo "<div class='col-2 m-3 '>
                    <div class=' mb-4  position-fixed '><a class=' col-1 rounded-pill' id='user' href='#' data-toggle='modal' data-target='#login-model'>
                        <i class='fa-solid fa-arrow-right-to-bracket'></i><span class=' d-none ms-3 d-xxl-inline-block'> Log-in or Sign-up</span></a>
                    </div>
                </div>";
            }
            ?>


        </div>
    </div>
</div>


<script>
   $(document).ready(function(){
    
  $('#toggle') .one ("click", function(){
    $('#lowbox').toggle ('normal');
    
  });
});
    
</script>
</body>