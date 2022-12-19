<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Activity') }}--}}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl mb-4">Edit Activity</h2>

                    <table class="border w-full">
                        <thead>
                        <tr>
                            <th>Performer</th>
                            <th>Model</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>Updated At</th>
                        </tr>

                        </thead>
                        <tbody>

                        @foreach($user->activity as $activity)
                            <tr>
                                <td class="border p-4">
                                    {{ $activity->performer->name }}
                                </td>
                                <td class="border p-4">
                                    {{ $activity->subject }}: <br>ID = {{ $activity->subject_id }}
                                </td>
                                <td class="border p-4">
                                    {{ ucwords($activity->action) }}
                                </td>
                                <td class="border p-4">
                                    @foreach(unserialize($activity->detail) as $key => $value)
                                        <p>{{ ucwords($key) }} :- {{ $value }}</p>
                                    @endforeach
                                </td>
                                <td class="border p-4">
                                    {{ $activity->created_at }}
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
