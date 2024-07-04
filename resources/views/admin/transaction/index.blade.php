<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                @if (session()->has('success'))
                    <div role="alert" class="alert alert-success text-white my-3">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0 stroke-current"
                        fill="none"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                <!-- Open the modal using ID.showModal() method -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <button class="btn btn-outline btn-success btn-sm my-3" onclick="my_modal_1.showModal()">Tambah Transaksi</button>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <form action="{{ route('transaction.store') }}" method="post">
                            @csrf
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Customer</span>
                                </div>
                                <select class="select select-bordered w-full" name="user_id">
                                    <option disabled selected>Pilih customer?</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Produk</span>
                                </div>
                                <select class="select select-bordered w-full" name="product_id">
                                    <option disabled selected>Pilih produk?</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} (Rp. {{ number_format($product->price) }})</option>
                                    @endforeach
                                </select>
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Tanggal Aktif</span>
                                </div>
                                <input type="date" name="start_date" class="input input-bordered w-full" />
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Tanggal Non Aktif</span>
                                </div>
                                <input type="date" name="end_date" class="input input-bordered w-full" />
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Status Pembayaran</span>
                                </div>
                                <select class="select select-bordered w-full" name="payment_status">
                                    <option disabled selected>Pilih status pembayaran?</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                            </label>
                            <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Tambah Transaksi</button>
                        </form>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
                <div class="overflow-x-auto">
                    <table id="data-table" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Tanggal Transaksi</th>
                                <th>Customer</th>
                                <th>Produk</th>
                                {{-- <th>Jumlah</th> --}}
                                <th>Total</th>
                                <th>Tanggal Akun Aktif</th>
                                <th>Tanggal Akun Non Aktif</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->invoice }}</td>
                                    <td>{{ date('d/m/Y', strtotime($transaction->date)) }}</td>
                                    <td>{{ $transaction->customer->name }}</td>
                                    <td>{{ $transaction->product->name }}</td>
                                    {{-- <td>{{ $transaction->qty }}</td> --}}
                                    <td>Rp. {{ number_format($transaction->total) }}</td>
                                    <td class="text-green-700">{{ date('d/m/Y', strtotime($transaction->date_start)) }}</td>
                                    <td class="text-red-700">{{ date('d/m/Y', strtotime($transaction->date_end)) }}</td>
                                    <td>{{ $transaction->payment_status }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('transaction.edit', $transaction) }}" class="btn btn-outline btn-info btn-sm">Edit</a>
                                            <form action="{{ route('transaction.destroy', $transaction) }}" class="inline" onsubmit="return confirm('Are you sure?')" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline btn-error btn-sm text-white">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
