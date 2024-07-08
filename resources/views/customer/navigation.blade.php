<div class="navbar" style="position:fixed; z-index: 100; background-color:rgb(32 33 36)">
    <div class="navbar-start">
        <a href="/" class="btn btn-ghost text-xl">
            <img src="{{ asset('images/logo.png') }}" class="max-w-full h-12">
        </a>
    </div>
    <div class="navbar-end hidden lg:flex">
        <ul class="menu menu-horizontal px-1 font-medium">
            @if (Auth::check())
                <li>
                    <li><a href="{{ url('/') }}" class="text-shadow">Home</a></li>
                    <li><a href="{{ route('page.checkAccount') }}" class="text-shadow">Cek Akun</a></li>
                    <li><a href="{{ route('page.transaction') }}" class="text-shadow">Transaksi</a></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="text-shadow border-none mt-2">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ url('/') }}" class="text-shadow">Home</a></li>
                <li><a href="{{ route('page.checkAccount') }}" class="text-shadow">Cek Akun</a></li>
                <li><a href="{{ route('login') }}" class="text-shadow">Login</a></li>
                <li><a href="{{ route('register') }}" class="text-shadow">Register</a></li>
            @endif
        </ul>
    </div>
    <div class="lg:hidden navbar-end">
        <div class="dropdown dropdown-end text-white">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                @if (Auth::check())
                    <li><a href="{{ url('/') }}" class="text-black">Home</a></li>
                    <li><a href="{{ route('page.checkAccount') }}" class="text-black">Cek Akun</a></li>
                    <li><a href="{{ route('page.transaction') }}" class="text-black">Transaksi</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="text-black border-none">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ url('/') }}" class="text-black">Home</a></li>
                    <li><a href="{{ route('page.checkAccount') }}" class="text-black">Cek Akun</a></li>
                    <li><a href="{{ route('login') }}" class="text-black">Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-black">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
