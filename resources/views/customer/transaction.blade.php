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
        @include('customer.navigation')

        <section style="background:linear-gradient(308deg, rgb(19 19 19 / 83%), rgba(110, 107, 107, 0.4)), url(http://127.0.0.1:8000/images/home.png); background-repeat: no-repeat; background-size: cover; min-height:740px; background-position: center;">
            <div class="text-center lg:px-36 px-12 pt-36 lg:pt-44 lg:text-5xl text-white" style="text-shadow: 2px 2px 3px rgba(43, 41, 41, 0.6); letter-spacing: 3px;">
                <h2><b>LIST <span class="text-red-700">TRANSAKSI</span></b></h2>
            </div>
            <div class="px-24">
                @foreach ($transactions as $transaction)
                    <div class="card mt-16 w-full shadow-xl" style="background-color: oklch(0.54 0.01 16.2 / 0.5); letter-spacing: 3px; position: relative">
                        <div class="card-body">
                            <h2 class="card-title text-xl md:text-3xl text-red-700 card-h">
                                {{ strtoupper($transaction->invoice) }}
                            </h2>
                            <div class="mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px; border-radius: 20px">
                                {{ $transaction->product->name }}
                            </div>
                            <div class="mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px; border-radius: 20px">
                                <div class="flex justify-between">
                                    <span>USERNAME</span>
                                    <span>{{ $transaction->netflixAccount->username }}</span>
                                </div>
                            </div>
                            <div class="mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px; border-radius: 20px">
                                <div class="flex justify-between">
                                    <span>EMAIL</span>
                                    <span>{{ $transaction->netflixAccount->email }}</span>
                                </div>
                            </div>
                            <div class="mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px; border-radius: 20px">
                                <div class="flex justify-between">
                                    <span>PASSWORD</span>
                                    <span>{{ $transaction->netflixAccount->password }}</span>
                                </div>
                            </div>
                            <div class="mt-2" style="background-color: oklch(0.24 0.01 0); border: 1px solid black; color: white; padding: 12px 40px; border-radius: 20px">
                                <div class="flex justify-between">
                                    <span>PIN</span>
                                    <span>{{ $transaction->netflixAccount->pin }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="card-actions mt-2">
                                <ul style="list-style: none;" class="text-m md:text-l">
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>Aktif {{ date('d/m/Y', strtotime($transaction->date_start)) }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>Non Aktif {{ date('d/m/Y', strtotime($transaction->date_end)) }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>Pembayaran {{ $transaction->payment_status }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex gap-2 shadow-light">
                                            <img src="{{ asset('images/check.png') }}" style="max-width: 100%; height: 20px"> <span>Harga Rp. {{ number_format($transaction->total) }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </body>
</html>
