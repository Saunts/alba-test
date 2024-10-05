<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <table class="pack-table">
        <tr>
            <th width="20%">Name</th>
            <th width="30%">Email</th>
            <th width="30%">Role</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td >
                {{$user->name}}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->role }}
            </td>
        </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
