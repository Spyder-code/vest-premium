<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            .text-shadow {
                text-shadow: 1px 0px 0px rgba(255, 255, 255, 0.6);
                font-weight: 900;
                color: white;
                letter-spacing: 2px;
            }
            .text-shadow:hover{
                text-shadow: 1px 0px 0px rgba(199, 5, 5, 0.6);
            }
        </style>
    </head>
    <body style="background-color:rgb(32 33 36)">
        <div class="font-sans antialiased">
            <div class="navbar" style="position:fixed; z-index: 100; background-color:rgb(32 33 36)">
                <div class="navbar-start">
                    <a href="/" class="btn btn-ghost text-xl">
                        <img src="{{ asset('images/logo.png') }}" class="max-w-full h-12">
                    </a>
                </div>
                <div class="navbar-end hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 font-medium">
                        <li><a href="{{ route('login') }}" class="text-shadow">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-shadow">Register</a></li>
                    </ul>
                </div>
                <div class="lg:hidden navbar-end">
                    <div class="dropdown dropdown-end text-white">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <li><a href="{{ route('login') }}" class="text-black">Login</a></li>
                            <li><a href="{{ route('register') }}" class="text-black">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{ $slot }}
        </div>
    </body>
</html>
