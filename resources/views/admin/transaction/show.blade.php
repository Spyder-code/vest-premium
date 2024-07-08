<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail '.$transaction->invoice) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 mx-2">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <h4>Detail Transaksi</h4>
                    <hr>
                    <div>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Customer</span>
                            </div>
                            <select readonly class="select select-bordered w-full" name="user_id">
                                <option value="" selected>{{ $transaction->customer->name }}</option>
                            </select>
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Produk</span>
                            </div>
                            <select readonly class="select select-bordered w-full" name="product_id">
                                <option value="" selected>{{ $transaction->product->name }} - Rp. {{ number_format($transaction->product->price) }}</option>
                            </select>
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Akun Netflix</span>
                            </div>
                            <select readonly class="select select-bordered w-full" name="netflix_account_id">
                                <option value="" selected>{{ $transaction->netflixAccount->username }} - {{ $transaction->netflixAccount->email }}</option>
                            </select>
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Tanggal Aktif</span>
                            </div>
                            <input readonly type="date" name="start_date" value="{{ $transaction->date_start }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Tanggal Non Aktif</span>
                            </div>
                            <input readonly type="date" name="end_date" value="{{ $transaction->date_end }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Status Pembayaran</span>
                            </div>
                            <select readonly class="select select-bordered w-full" name="payment_status">
                                <option value="" selected>{{ $transaction->payment_status }}</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 mx-2">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <h4>Akun Netflix</h4>
                    <hr>
                    <div>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Username</span>
                            </div>
                            <input readonly type="text" value="{{ $transaction->netflixAccount->username }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Email</span>
                            </div>
                            <input readonly type="text" value="{{ $transaction->netflixAccount->email }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Password</span>
                            </div>
                            <input readonly type="text" value="{{ $transaction->netflixAccount->password }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">PIN</span>
                            </div>
                            <input readonly type="text" value="{{ $transaction->netflixAccount->pin }}" class="input input-bordered w-full" />
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
