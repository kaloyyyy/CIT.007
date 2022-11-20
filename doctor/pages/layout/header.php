<div class="nav w-100 justify-content-center sticky-top p-2 blur">
<?php
require_once __DIR__.'/../../config.php';
$home = "<a class='nav-link  rounded-pill px-2 mx-2 border bg-white' href='/pages/account/home.php'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-home svg mx-1'></i>
                        <span class='ml-0 mr-1 d-none d-xl-inline-block'>HOME</span>
                    </div>
                </a>";

$addSched = "<a class='nav-link  rounded-pill px-2 mx-2 border bg-white' href='/pages/scheds/add.php'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-calendar svg mx-1'></i>
                        <span class='ml-0 mr-1 d-none d-xl-inline-block'>Schedule an Appointment</span>
                    </div>
                </a>";

$viewSched = "<a class='nav-link  rounded-pill px-2 mx-2 border bg-white' href='/pages/scheds/view.php'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-search svg mx-1'></i>
                        <span class='ml-0 mr-1 d-none d-xl-inline-block'>View my Appointments</span>
                    </div>
                </a>";

$logout = "<a class='nav-link  rounded-pill px-2 mx-2 border bg-white' href='/pages/account/logout.php'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-arrow-alt-circle-right svg mx-1'></i>
                        <span class='ml-0 mr-1 d-none d-xl-inline-block'>Logout</span>
                    </div>
                </a>";
$addProfile = "
<a class='nav-link  rounded-pill px-2 mx-2 border bg-white' href='/pages/profile/add.php'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-user-plus svg mx-1'></i>
                        <span class='ml-0 mr-1 d-none d-xl-inline-block'>Add Profile</span>
                    </div>
                </a>
";
echo $home. $addSched.$viewSched.$addProfile. $logout;
?>
</div>
