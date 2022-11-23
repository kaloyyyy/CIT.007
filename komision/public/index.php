<body class=" darktheme ">
<div class="container-fluid mx-xl-5 px-xl-5 px-lg-0 mx-lg-0">
    <div class="px-xl-5">
        <div class="row justify-content-center">
            <div class="col-2 d-flex justify-content-end ">
                <?php include 'left-bar.php';
                ?>
            </div>
            <div class=" col-6  post-border border-left border-right  p-0 m-0">
                <?php
                if (isset($_GET['page'])) {
                    $currentPage = $_GET['page'];
                }

                ?>
                <?php
                $sample = "<div class=' border-top post-border border-bottom px-3 py-2'> 
                <h4>Komi-Sion offers a variety of services such as graphics and design, digital marketing, essay writing, video and animation, and programming.</h4>  

                </div>";
                $sample1 = "<div class=' border-top post-border border-bottom px-3 py-2'>  

                 <h1>Services: </h1>
                    <h4>Graphics and Design </h4>
                    <p> Graphic design is a craft where professionals create visual content to communicate messages. By applying visual hierarchy and page layout techniques, designers use typography and pictures to meet users' specific needs and focus on the logic of displaying elements in interactive designs, to optimize the user experience.</p>
                    <h4>Digital Marketing</h4>
                    <p>Digital marketing, also called online marketing, is the promotion of brands to connect with potential customers using the internet and other forms of digital communication. This includes not only email, social media, and web-based advertising, but also text and multimedia messages as a marketing channel. </p>  
                    <h4>Essay Writing</h4>
                    <p>a short piece of writing on a particular subject, often expressing personal views. In a school test, an essay is a written answer that includes information and discussion, usually to test how well the student understands the subject. </p>
                    <h4>Video and Animation</h4>
                    <p>Animation video is a technique in which images go through the process of designing, layout addition, and photographic sequences to create an illusion of action. Animated meaning can be better understood as a simulation of movement that is created by showing a series of pictures. </p>
                    <h4>Programming</h4>
                    <p> Programming is the implementation of logic to facilitate specified computing operations and functionality. It occurs in one or more languages, which differ by application, domain and programming model. </p>


                </div>";




                $sample2 = "<div class=' border-top post-border border-bottom px-3 py-2 d-flex justify-content-center'><h1>Welcome to Komision</h1>




                </div>";
                $sample3 = "<div class=' border-top post-border border-bottom px-3 py-2 d-flex justify-content-center'>

                        <h4> Komision is a Local online marketplace for freelance services. Komision's platform connects freelancers to people or businesses looking to hire.</h4>





                </div>";
                $sample4= "<div class=' border-top post-border border-bottom px-3 py-2 '>


               <h4> Best For Every Budget. </h4>

                     <p> Find high-quality services at every price point. No hourly rates, just project-based pricing.  </p>
               <h4> Quality work done quickly </h4>

                <p>  Find the right freelancer to begin working on your project within minutes. </p>

                <h4>Protected Payments, Every Time </h4>

                 <p> Always know what you'll pay upfront. Your payment isn't released until you approve the work.  </p>

                


                </div>";
                $sample5 = "<div class=' border-top post-border border-bottom px-3 py-2 d-flex justify-content-center'><h2>A whole world of freelance talent at your fingertips</h2>

                </div>";





                include 'header.php';
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'Messages') {
                        echo "<div >";
                        require __DIR__ . "/../src/chats/chats.php";
                        echo "</div>";
                    } else if ($_GET['page'] == 'Listings') {
                        require __DIR__ . "/../src/post-request/post-display.php";
                    } else {

                        echo  $sample2 . $sample . $sample1 . $sample5 . $sample4 ;
                    }
                } else {

                    echo  $sample2 . $sample . $sample1 . $sample5 . $sample4;
                }

                ?>
            </div>
            <div class= 'col-2 m-2'>
                <?php
                function userTab($icon, $username, $target): void
                {
                    echo "
                
                    <div class='position-fixed'>
                        <a class='d-flex rounded-pill align-content-center justify-content-center ' id='user' href='#' data-toggle='modal' data-target='$target' style=''>
                            <div class='d-flex align-content-center justify-content-center'>
                                <div class='rounded-pill bg-light text-center' style='width: 2em'>$icon</div>
                                <span class='d-none ms-3 d-xl-inline-block p-1 text-center'>$username</span>
                            </div>
                        </a>
                    </div>
                
                ";
                }

                if (isset($_SESSION['id'])) {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id'];
                    $file = '/komision/src/uploads/'.$id.'.jpg';
                    $file2 = '/komision/src/uploads/'.$id.'.png';
                    if(!file_exists($file)) {
                    }
                    $alt = "<i class='fa-solid fa-arrow-right-to-bracket'></i>";
                    $icon = "<img src = $file alt='' class='rounded-pill'  style='height: 2em'>";
                    $target = '#logged-model';
                } else {
                    $username = "Login or Signup";
                    $icon = "<i class='fa-solid fa-arrow-right-to-bracket py-2'></i>";
                    $target = '#login-model';
                }
                userTab($icon, $username, $target);
                ?>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        $('#toggle').on("click", function () {
            $('#lowbox').toggle('normal');

        });
    });

</script>
</body>