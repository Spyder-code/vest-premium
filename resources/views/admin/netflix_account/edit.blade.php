<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT '.$netflix_account->username) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
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
                <form action="{{ route('netflix-account.update', $netflix_account) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Username
                        <input type="text" name="username" class="grow border-none" value="{{ $netflix_account->username }}" />
                    </label>
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Email
                        <input type="text" name="email" class="grow border-none" value="{{ $netflix_account->email }}" />
                    </label>
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Password
                        <input type="text" name="password" class="grow border-none" value="{{ $netflix_account->password }}" autocomplete="off"/>
                    </label>
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        PIN
                        <input type="text" name="pin" class="grow border-none" value="{{ $netflix_account->pin }}" />
                    </label>
                    <a href="{{ route('netflix-account.index') }}" class="btn-sm btn btn-outline">Kembali</a>
                    <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
