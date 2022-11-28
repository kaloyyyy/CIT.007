<?php
$username = htmlspecialchars($_SESSION["username"]);

?>
<div class="nav w-100 justify-content-center sticky-top p-2">


    <?php

    function navTab($icon, $title, $pageLink): string
    {
        return "<a class='nav-link  rounded-pill px-2 mx-2 border' href='/?page=$pageLink'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-$icon svg mx-1'></i>
                        <span class='ml-0 mr-1 d-none d-xl-inline-block'>$title</span>
                    </div>
                </a>";
    }

    $patients = "<a class='nav-link rounded-pill px-2 mx-2 border' href='/?page=patients'>
                    <div class='nav-item'>
                    <i class='fa-solid  svg mx-1'></i>
                    <span class='mx-1 d-none d-xl-inline-block'>SODA Patients</span>
                    </div>
                </a>";
    $user = navTab("user", $username, "home");
    $doctor = navTab("user-doctor", $username, "home");
    $admin = navTab("user-secret", $username, "home");
    $addApp = navTab("file-circle-plus", "Add an Appointment", "addApp");
    $updateApp = navTab("pen-to-square", "Update an Appointment", "updateApp");
    $viewApp = navTab("calendar-days", "View Appointments", "viewApp");
    $addProfile = (navTab('user-plus',"Add Patient Profile","addProfile"));
    $viewProfile = (navTab('users',"View Patient Profile","viewProfile"));
    if (isset($_SESSION) && $_SESSION['userType'] == 0) {
        echo $user . $addApp . $updateApp . $viewApp;
    } else if (isset($_SESSION) && $_SESSION['userType'] == 1) {
        echo $doctor . $viewApp . $updateApp;
    } else if (isset($_SESSION) && $_SESSION['userType'] == 2) {
        echo $addProfile. $viewProfile;
    }
    echo navTab("arrow-alt-circle-right", "Logout", 'logout');
    ?>
</div>
