<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Produk') }}
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
                <button class="btn btn-outline btn-success btn-sm my-3" onclick="my_modal_1.showModal()">Tambah Produk</button>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <form action="{{ route('product.store') }}" method="post">
                            @csrf
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Nama Produk</span>
                                </div>
                                <input type="text" name="name" placeholder="nama produk" class="input input-bordered w-full" />
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Tipe Produk</span>
                                </div>
                                <select class="select select-bordered w-full" name="type">
                                    <option disabled selected>Pilih tipe?</option>
                                    <option value="Sharing">Sharing</option>
                                    <option value="Private">Private</option>
                                </select>
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Deskripsi</span>
                                </div>
                                <input type="text" name="description" placeholder="deskripsi produk" class="input input-bordered w-full" />
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Stok</span>
                                </div>
                                <input type="number" name="stock" placeholder="100" class="input input-bordered w-full" />
                            </label>
                            <label class="form-control mb-2 w-full">
                                <div class="label">
                                    <span class="label-text">Harga</span>
                                </div>
                                <input type="number" name="price" placeholder="1000" class="input input-bordered w-full" />
                            </label>
                            <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Tambah Produk</button>
                        </form>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <a href="{{ route('product.edit', $product) }}" class="btn btn-outline btn-info btn-sm">Edit</a>
                                        <form action="{{ route('product.destroy', $product) }}" class="inline" onsubmit="return confirm('Are you sure?')" method="post">
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
</x-app-layout>
