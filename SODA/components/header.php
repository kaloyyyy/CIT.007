<?php

?>
<div class="nav w-100 justify-content-center sticky-top p-2">
    <a class='nav-link  rounded-pill px-2 mx-2 border' href='/soda/?page=home'>
        <div class='nav-item'>
            <i class='fa-solid fa-user svg mx-1'></i>
            <span class='mx-1 d-none d-xl-inline-block'><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
        </div>
    </a>

    <?php
    $userEcho = "<a class='nav-link rounded-pill px-2 mx-2 border' href='/soda/?page=viewApp'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-magnifying-glass svg'></i>
                        <span class='mx-2 d-none d-xl-inline-block'>View my Appointments</span>
                    </div>
                </a>
                <a class='nav-link  rounded-pill px-2 mx-2 border' href='/soda/?page=addApp'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-plus-square svg mx-1'></i><span
                                class='mx-1 d-none d-xl-inline-block'>Add an Appointment</span>
                    </div>
                </a>
                <a class='nav-link rounded-pill px-2 mx-2 border' href='/soda/?page=updateApp'>
                    <div class='nav-item'>
                        <i class='fa-solid fa-upload svg mx-1'></i>
                        <span class='mx-1 d-none d-xl-inline-block'>Update an Appointment</span>
                    </div>
                </a>";
    $toEcho = " <a class='nav-link rounded-pill px-2 mx-2 border' href='/soda/?page=patients'>
                    <div class='nav-item'>
                    <i class='fa-solid fa-upload svg mx-1'></i>
                    <span class='mx-1 d-none d-xl-inline-block'>SODA Patients</span>
                    </div>
                </a>
                <a class='nav-link rounded-pill px-2 mx-2 border' href='/soda/?page=appoints'>
                    <div class='nav-item'>
                    <i class='fa-solid fa-upload svg mx-1'></i>
                    <span class='mx-1 d-none d-xl-inline-block'>Appointments</span>
                    </div>
                </a>";
    if (isset($_SESSION) && $_SESSION['userType'] > 0) {
        echo $toEcho;
    }else{
        echo $userEcho;
    }
    ?>
    <a class='nav-link  rounded-pill px-2 mx-2 border' href='/soda/?page=logout'>
        <div class='nav-item'>
            <i class='fa-solid fa-arrow-alt-circle-right svg mx-1'></i>
            <span class='mx-1 d-none d-xl-inline-block'>logout</span>
        </div>
    </a>
</div>
