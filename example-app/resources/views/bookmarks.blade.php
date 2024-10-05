<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bookmarked post') }}
        </h2>
    </x-slot>

    @foreach ($posts as $post)
        <x-post :post="$post" :bookmarks="$bookmarks" :user="$user"/>
    @endforeach
</x-app-layout>
