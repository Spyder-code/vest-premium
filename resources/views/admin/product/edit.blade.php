<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT '.$product->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="w-full mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('product.update', $product) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Nama Produk</span>
                            </div>
                            <input type="text" name="name" value="{{ $product->name }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Tipe Produk</span>
                            </div>
                            <select class="select select-bordered w-full" name="type">
                                <option disabled>Pilih tipe?</option>
                                <option {{ $product->type=='Sharing'?'selected':'' }} value="Sharing">Sharing</option>
                                <option {{ $product->type=='Private'?'selected':'' }} value="Private">Private</option>
                            </select>
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Deskripsi</span>
                            </div>
                            <input type="text" name="description" value="{{ $product->description }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Stok</span>
                            </div>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="input input-bordered w-full" />
                        </label>
                        <label class="form-control mb-2 w-full">
                            <div class="label">
                                <span class="label-text">Harga</span>
                            </div>
                            <input type="number" name="price" value="{{ $product->price }}" class="input input-bordered w-full" />
                        </label>
                        <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Update Produk</button>
                    </form>
                </div>
            </div>
            <div class="w-full mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <button class="btn btn-outline btn-success btn-sm my-3" onclick="my_modal_1.showModal()">Tambah Keterangan</button>
                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box">
                            <form action="{{ route('product-behavior.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <label class="form-control mb-2 w-full">
                                    <div class="label">
                                        <span class="label-text">Keterangan</span>
                                    </div>
                                    <input type="text" name="name" placeholder="Keterangan" class="input input-bordered w-full" />
                                </label>
                                <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Tambah</button>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
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
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->product_behaviors as $behavior)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $behavior->name }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <form action="{{ route('product-behavior.destroy', $behavior) }}" class="inline" onsubmit="return confirm('Are you sure?')" method="post">
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
