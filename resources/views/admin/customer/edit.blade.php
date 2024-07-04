<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT '.$customer->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('customer.update', $customer) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Nama
                        <input type="text" name="name" class="grow border-none" value="{{ $customer->name }}" />
                    </label>
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Email
                        <input type="text" name="email" class="grow border-none" value="{{ $customer->email }}" disabled />
                    </label>
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Phone
                        <input type="text" name="phone" class="grow border-none" value="{{ $customer->phone }}" disabled />
                    </label>
                    <label class="my-2 input input-bordered flex items-center gap-2">
                        Password
                        <input type="password" name="password" class="grow border-none" autocomplete="off"/>
                    </label>
                    <a href="{{ route('customer.index') }}" class="btn-sm btn btn-outline">Kembali</a>
                    <button type="submit" class="btn-sm btn btn-outline btn-success" onclick="return confirm('Are you sure?')">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
