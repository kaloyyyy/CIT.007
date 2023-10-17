@extends('layouts.app') {{-- Assuming you have a layout named 'app' --}}

@section('content')
<div class="container">
    @auth
    <!-- Content to show when authenticated -->
    <div class="header-content">
        Welcome, {{ Auth::user()->name }}
        <!-- Add any other authenticated user content here -->
    </div>
    @endauth
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome to Your Dashboard</h1>
            {{-- Add your dashboard content here --}}
        </div>
    </div>


    <div class="row">
        <a class="col-md-12" href="{{ route('newOrders.index') }}">
            new
        </a>
    </div>
    <div class="row">
        <a class="col-md-12" href="{{ route('viewOrders.index') }}">
            view
        </a>
    </div>

    <br>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>

</div>


@endsection
