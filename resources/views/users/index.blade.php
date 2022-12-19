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
                    <h2 class="text-xl mb-4">Users</h2>

                    @if($users)

                        <table class="border w-full">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="border p-4">{{ $user->id }}</td>
                                    <td class="border p-4">{{ $user->name }}</td>
                                    <td class="border p-4">{{ $user->email }}</td>
                                    <td class="border p-4">
                                        <a href="{{ Route('users.edit' , ['id' => $user->id]) }}" class="bg-green-700 text-white px-2 py-1 rounded"><small>EDIT</small></a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    @else

                        <strong>Sorry there are no users at the moment</strong>

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
