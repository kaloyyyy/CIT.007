<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/src/pages/style.css">
    <script src="https://kit.fontawesome.com/bf1c643ee2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
</head>
<body>
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#hero"><i class="fa-sharp fa-solid fa-house"></i> Home </a>
    <a href="#services"><i class="fa-solid fa-ticket"></i> Services</a>
    <a href="#"> <i class="fa-solid fa-rectangle-list"></i> Listing</a>
    <a href="#"><i class="fa-solid fa-circle-user"></i> Login</a>
</div>

<div id="main" class="sticky-top">


    <button class="openbtn" onclick="openNav()">&#9776; Komision
    </button>
</div>




<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Komision</h1>
                <h2 >Find the Best Freelance Services for Your Interests</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="/index.php/?page=login" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="/src/pages/img/sideimg.png" class="" alt="">
            </div>
        </div>
    </div>
</section>


<section class="brand" style="background-color: rgba(209, 202, 202, 0.582)">
    <div class="container">
        <h2 class="text-center font-weight-bold">Trusted By:</h2>
        <section class="customer-logos slider">
            <div class="slide"><img src="/src/pages/img/fb.png" alt="logo"></div>
            <div class="slide"><img src="/src/pages/img/twitter.png" alt="logo"></div>
            <div class="slide"><img src="/src/pages/img/github.png" alt="logo"></div>
            <div class="slide"><img src="/src/pages/img/fiverr.png" alt="logo"></div>
            <div class="slide"><img src="/src/pages/img/google.png" alt="logo"></div>
            <div class="slide"><img src="/src/pages/img/toptal.png" alt="logo"></div>
            <div class="slide"><img src="/src/pages/img/upwork.png" alt="logo"></div>
        </section>
    </div>
</section>



<div class="container text-center my-5">
    <h2 class="font-weight-light">Popular services</h2>
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="col-md-3 ">
                        <div class="card cardo" >
                            <div class="card-img ">
                                <img src="/src/pages/img/programming.webp" class="img-fluid">
                                <div class="card-img-overlay" style="color: white;">
                                    <h5>Solve Coding Problems</h5>
                                        <h3>Code Tutorial</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="col-md-3 ">
                        <div class="card cardo" >
                            <div class="card-img">
                                <img src="/src/pages/img/mic.webp" class="img-fluid ">
                                <div class="card-img-overlay" style="color: white;">
                                    <h5>Enhance audios</h5>
                                        <h3>Audio enhancer</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card cardo">
                            <div class="card-img">
                                <img src="/src/pages/img/essay.webp" class="img-fluid">
                            </div>
                            <div class="card-img-overlay" style="color: white;">
                                <h5>Improve writings</h5>
                                    <h3>Essay making</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card cardo">
                            <div class="card-img">
                                <img src="/src/pages/img/design.jpg" class="img-fluid">
                            </div>
                            <div class="card-img-overlay" style="color: white;">
                                <h5>Build your design</h5>
                                    <h3>Design making</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card cardo">
                            <div class="card-img">
                                <img src="/src/pages/img/editingvideo.webp" class="img-fluid">
                                <div class="card-img-overlay" style="color: white;">
                                    <h5>Enhance your audienc</h5>
                                        <h3>Video Enhancer</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card cardo">
                            <div class="card-img">
                                <img src="/src/pages/img/digitalmarketing.webp" class="img-fluid">
                            </div>
                            <div class="card-img-overlay" style="color: white;">
                                <h5>Boost your markets</h5>
                                    <h3>Digital Marketing</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

</div>

<section id="lowinfo">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1 hero-img" data-aos="fade-up" data-aos-delay="200">
                <img src="/src/pages/img/upbg.png" height="80%" width="80%">
            </div>
            <div class="col-lg-7 order-1 order-lg-2 hero-img mt-5" >
                <h1>Your Trusted Freelancing Application</h1>
                <br>


                <figure class="text-center mb-0">
                    <blockquote class="blockquote">
                        <p class="pb-3">
                            <i class="fas fa-quote-left fa-xs text-primary"></i>
                            <span class="lead font-italic ">If you hire people just because they can do a job, they’ll work for your money. But if you hire people who believe what you believe, they’ll work for you with blood and sweat and tears."
                           </span>
                            <i class="fas fa-quote-right fa-xs text-primary"></i>
                        </p>
                    </blockquote>
                    <figcaption class="blockquote-footer mb-0">
                        Simon Sinek
                    </figcaption>
                </figure>


            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container ">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h6 class="text-primary mt-5">SERIVCES</h6>
                <h1>Our Services</h1>
                <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                    in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect bounceInUp text-center">
                    <div class="iconbox ">
                        <img src="https://img.icons8.com/external-becris-lineal-becris/64/FFFFFF/external-graphic-designer-coding-programming-becris-lineal-becris.png" height="32" width="32"/>
                    </div>
                    <h5 class="mt-4 mb-2">Graphics and Design</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                        perferendis </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect text-center">
                    <div class="iconbox ">
                        <img src="https://img.icons8.com/external-smashingstocks-mixed-smashing-stocks/68/FFFFFF/external-digital-marketing-freelance-smashingstocks-mixed-smashing-stocks.png" height="32" width="32"/>
                    </div>
                    <h5 class="mt-4 mb-2">Digital Marketing</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                        perferendis </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect text-center">
                    <div class="iconbox">
                        <img src="https://img.icons8.com/external-becris-lineal-becris/64/FFFFFF/external-writing-coping-skills-becris-lineal-becris.png"  height="32" width="32"/>
                    </div>
                    <h5 class="mt-4 mb-2">Essay Writing</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                        perferendis </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect text-center">
                    <div class="iconbox">
                        <img src="https://img.icons8.com/ios/50/FFFFFF/video-conference.png" height="32" width="32"/>
                    </div>
                    <h5 class="mt-4 mb-2">Video and Animation</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                        perferendis </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect text-center">
                    <div class="iconbox">
                        <img src="https://img.icons8.com/ios/50/FFFFFF/source-code.png"  height="32" width="32"/>
                    </div>
                    <h5 class="mt-4 mb-2">Programming</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                        perferendis </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect text-center pb-5">
                    <div class="iconbox">
                        <img src="https://img.icons8.com/ios/50/FFFFFF/easy-listening.png"height="32" width="32"/>
                    </div>
                    <h5 class="mt-4 mb-2">Music and Audio</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo asperiores
                        perferendis </p>
                </div>
            </div>
        </div>
    </div>
</section>



<footer class="text-center text-white" style="background-color: #f1f1f1;">
    <!-- Grid container -->
    <div class="container pt-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-twitter"></i
                ></a>

            <!-- Google -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-google"></i
                ></a>

            <!-- Instagram -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-linkedin"></i
                ></a>
            <!-- Github -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-github"></i
                ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        ©
        <a class="text-dark" href="#hero">Komision Local ltd.2022</a>
    </div>
    <!-- Copyright -->
</footer>
<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";

    }

    /* slider*/

    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })




    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover:false,
            responsive: [{
                breakpoint: 768,
                setting: {
                    slidesToShow:4
                }
            }, {
                breakpoint: 520,
                setting: {
                    slidesToShow: 3
                }
            }]
        });
    });

</script>

</body>



