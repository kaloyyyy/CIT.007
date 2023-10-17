<!-- resources/views/components/header.blade.php -->
@guest
<header class="nav bg-secondary d-flex justify-content-evenly max-vh-25 min-vh-25 align-content-center align-items-center">
    <!-- Your header content goes here -->
    <div class="">

    </div>

        <div class="">
            <div class="">
                <img src="{{ asset('images/logo_PTLechon.png') }}" alt="logo" style="width: 69px">
            </div>
        </div>

    <div>

    </div>
</header>
@endguest
@auth
<!-- resources/views/components/header.blade.php -->
<header class="nav bg-secondary d-flex justify-content-evenly max-vh-25 min-vh-25 align-content-center align-items-center">
    <!-- Your header content goes here -->
    <div class="">

    </div>
    <a href="{{ route('dashboard') }}">
        <div class="">
            <div class="">
                <img src="{{ asset('images/logo_PTLechon.png') }}" alt="logo" style="width: 69px">
            </div>
        </div>
    </a>

    <div>

    </div>
</header>

@endauth
