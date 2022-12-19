<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl mb-4">Edit User</h2>

                    <form action="{{ Route('users.update', ['id' => $user->id]) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block">Email</label>
                            <input type="text" name="email" id="email" value="{{ $user->email }}" class="w-full rounded">
                        </div>

                        <div class="mb-4">
                            <input type="submit" value="Update" class="bg-green-700 text-white rounded px-4 py-2">
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
