<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT '.$transaction->invoice) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('transaction.update', $transaction) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="form-control mb-2 w-full">
                        <div class="label">
                            <span class="label-text">Customer</span>
                        </div>
                        <select class="select select-bordered w-full" name="user_id">
                            <option disabled selected>Pilih customer?</option>
                            @foreach ($users as $user)
                                <option {{ $transaction->user_id==$user->id?'selected':'' }} value="{{ $user->id }}">{{ $user->name }}</option>
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
                                <option {{ $transaction->product_id==$product->id?'selected':'' }} value="{{ $product->id }}">{{ $product->name }} (Rp. {{ number_format($product->price) }})</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="form-control mb-2 w-full">
                        <div class="label">
                            <span class="label-text">Akun Netflix</span>
                        </div>
                        <select class="select select-bordered w-full" name="netflix_account_id">
                            <option disabled selected>Pilih akun netflix?</option>
                            @foreach ($netflix_accounts as $netflix_account)
                                <option {{ $transaction->netflix_account_id==$netflix_account->id?'selected':'' }} value="{{ $netflix_account->id }}">{{ $netflix_account->username }} - {{ $netflix_account->email }} </option>
                            @endforeach
                        </select>
                    </label>
                    <label class="form-control mb-2 w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Aktif</span>
                        </div>
                        <input type="date" name="start_date" value="{{ $transaction->date_start }}" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control mb-2 w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Non Aktif</span>
                        </div>
                        <input type="date" name="end_date" value="{{ $transaction->date_end }}" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control mb-2 w-full">
                        <div class="label">
                            <span class="label-text">Status Pembayaran</span>
                        </div>
                        <select class="select select-bordered w-full" name="payment_status">
                            <option disabled selected>Pilih status pembayaran?</option>
                            <option {{ $transaction->payment_status=='Pending'?'selected':'' }} value="Pending">Pending</option>
                            <option {{ $transaction->payment_status=='Lunas'?'selected':'' }} value="Lunas">Lunas</option>
                        </select>
                    </label>
                    <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Update Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
