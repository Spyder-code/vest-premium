<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Customer') }}
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
                <button class="btn btn-outline btn-success btn-sm my-3" onclick="my_modal_1.showModal()">Tambah Akun Netflix</button>
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <form action="{{ route('netflix-account.store') }}" method="post">
                            @csrf
                            <label class="my-2 input input-bordered flex items-center gap-2">
                                Username
                                <input type="text" name="username" class="grow border-none" placeholder="full name" />
                            </label>
                            <label class="my-2 input input-bordered flex items-center gap-2">
                                Email
                                <input type="text" name="email" class="grow border-none" placeholder="email"/>
                            </label>
                            <label class="my-2 input input-bordered flex items-center gap-2">
                                Password
                                <input type="text" name="password" class="grow border-none" autocomplete="off"/>
                            </label>
                            <label class="my-2 input input-bordered flex items-center gap-2">
                                PIN
                                <input type="text" name="pin" class="grow border-none" autocomplete="off"/>
                            </label>
                            <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Tambah Akun</button>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Pin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($netflix_accounts as $netflix_account)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $netflix_account->username }}</td>
                                <td>{{ $netflix_account->email }}</td>
                                <td>{{ $netflix_account->password }}</td>
                                <td>{{ $netflix_account->pin }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <a href="{{ route('netflix-account.edit', $netflix_account) }}" class="btn btn-outline btn-info btn-sm">Edit</a>
                                        <form action="{{ route('netflix-account.destroy', $netflix_account) }}" class="inline" onsubmit="return confirm('Are you sure?')" method="post">
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
