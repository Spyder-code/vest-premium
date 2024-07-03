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
            .shadow-light{
                color: rgb(252, 252, 252);
                text-shadow: 2px 2px 3px rgba(20, 20, 20, 0.6);
            }
            .card-h{
                background-color: #1e1e23;
                text-shadow: 2px 2px 3px rgba(1, 1, 1, 0.6);
                position: absolute;
                top: -27px;
                left: -5px;
                border-radius: 20px;
                padding: 5px 20px;
                box-shadow: 2px 3px 2px 3px red;
            }
        </style>
    </head>
    <body class="font-sans antialiased" style="height: 100vh">
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

        <section style="background:linear-gradient(308deg, rgb(19 19 19 / 83%), rgba(110, 107, 107, 0.4)), url(http://127.0.0.1:8000/images/home.png); background-repeat: no-repeat; background-size: cover; height:740px; background-position: center;">
            <div class="text-center lg:px-36 px-12 pt-36 lg:pt-44 lg:text-5xl text-white" style="text-shadow: 2px 2px 3px rgba(43, 41, 41, 0.6); letter-spacing: 3px;">
                <h2><b>VEST <span class="text-red-700">X</span> ANG PREMIUM</b></h2>
                <p class="lg:text-2xl" style="">Temukan Langganan Netflixmu di sini. Kualitas terbaik dan bawa dunia hiburan ke rumah Anda dengan Netflix</p>
            </div>
            <div class="text-center mt-12 lg:px-36 lg:mt-24 lg:text-2xl text-white">
                <div class="cards border bg-natural" style="background-color: oklch(0.23 0.01 255.81); padding:2rem; text-shadow: 2px 2px 3px rgba(15, 14, 14, 0.6); letter-spacing: 3px;">
                    <h3><span class="text-red-700">STOK</span> NETFLIX</h3>
                    <hr>
                    <table class="w-full mt-3">
                        <tr>
                            <td>Private: </td>
                            <td>Sharing: </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <section class="pb-36" style="background:linear-gradient(180deg, rgb(39 37 38 / 83%), rgba(35, 34, 34, 0.4)), url('{{ asset('images/home2.jpg') }}'); backgroun-position: center; background-repeat: no-repeat; background-size: cover;">
            <div class="text-center px-12 lg:px-36 lg:text-2xl text-white">
                <div class="text-center lg:px-12 pt-12 lg:pt-24 text-3xl md:text-5xl text-white" style="text-shadow: 2px 2px 3px rgba(1, 1, 1, 0.6); letter-spacing: 3px;">
                    <h2><b>NETFLIX</b> <span class="text-red-700">PREMIUM</span></h2>
                    <p class="lg:text-2xl text-xl mt-5" style="">4K UHD FULL GUARANTED</p>
                </div>
                <div class="flex flex-col md:flex-row justify-center gap-5 text-danger" style="color: red">
                    <div class="card mt-16 w-full shadow-xl" style="background-color: oklch(0.54 0.01 16.2 / 0.5); letter-spacing: 3px; position: relative">
                        <div class="card-body">
                            <h2 class="card-title text-xl md:text-3xl text-red-700 card-h">
                                SHARING
                            </h2>
                            <div class="badge mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px;">1 Profile 1 User</div>
                            <div class="text-center">
                                <h2 class="text-xl md:text-3xl" style="color: rgb(252, 252, 252); text-shadow: 2px 2px 3px rgba(20, 20, 20, 0.6); letter-spacing: 1px;">
                                    <b><span class="text-xl">Rp.</span> 25.000.000 / <span class="text-xl">Bln</span></b>
                                </h2>
                            </div>
                            <button class="btn btn-outline btn-ghost text-white py-3">Buy Now</button>
                            <hr>
                            <div class="card-actions mt-2">
                                <ul style="list-style: none;" class="text-m md:text-l">
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-16 w-full shadow-xl" style="background-color: oklch(0.54 0.01 16.2 / 0.5); letter-spacing: 3px; position: relative">
                        <div class="card-body">
                            <h2 class="card-title text-3xl text-red-700 card-h">
                                SHARING
                            </h2>
                            <div class="badge mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px;">1 Profile 1 User</div>
                            <div class="text-center">
                                <h2 class="text-3xl" style="color: rgb(252, 252, 252); text-shadow: 2px 2px 3px rgba(20, 20, 20, 0.6); letter-spacing: 1px;">
                                    <b><span class="text-xl">Rp.</span> 25.000.000 / <span class="text-xl">Bln</span></b>
                                </h2>
                            </div>
                            <button class="btn btn-outline btn-ghost text-white py-3">Buy Now</button>
                            <hr>
                            <div class="card-actions mt-2">
                                <ul style="list-style: none; font-size: 1.2rem">
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>1 Profile Private</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </body>
</html>
