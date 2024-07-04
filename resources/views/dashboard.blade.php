<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="stats shadow">
                        <div class="stat place-items-center">
                            <div class="stat-figure text-primary">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block h-8 w-8 stroke-current">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div class="stat-title">Total Customer</div>
                            <div class="stat-value text-primary">{{ number_format($customer_count) }}</div>
                        </div>

                        <div class="stat place-items-center">
                            <div class="stat-figure text-success">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block h-8 w-8 stroke-current">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="stat-title">Total Transaksi</div>
                            <div class="stat-value text-success">{{ $transaction->count() }}</div>
                        </div>
                        <div class="stat place-items-center">
                            <div class="stat-figure text-warning">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block h-8 w-8 stroke-current">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="stat-title">Transaksi Aktif</div>
                            <div class="stat-value text-warning">{{ $transaction->where('status',1)->count() }}</div>
                        </div>
                        <div class="stat place-items-center">
                            <div class="stat-figure text-info">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="inline-block h-8 w-8 stroke-current">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="stat-title">Transaksi Selesai</div>
                            <div class="stat-value text-info">{{ $transaction->where('status',0)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 mt-5">
                <h1 class="text-2xl font-bold mb-5">List Transaksi Aktif</h1>
                <div class="overflow-x-auto">
                    <table id="data-table" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Tanggal Transaksi</th>
                                <th>Customer</th>
                                <th>Produk</th>
                                <th>Tanggal Akun Aktif</th>
                                <th>Tanggal Akun Non Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->where('status',1)->sortByDesc('date') as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->invoice }}</td>
                                    <td>{{ date('d/m/Y', strtotime($transaction->date)) }}</td>
                                    <td>{{ $transaction->customer->name }}</td>
                                    <td>{{ $transaction->product->name }}</td>
                                    <td class="text-green-700">{{ date('d/m/Y', strtotime($transaction->date_start)) }}</td>
                                    <td class="text-red-700">{{ date('d/m/Y', strtotime($transaction->date_end)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
