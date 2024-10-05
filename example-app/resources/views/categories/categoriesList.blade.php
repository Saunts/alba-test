<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>

    <table class="pack-table">
        <tr>
            <th width="50%">Name</th>
            <th></th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td >
                    {{$category->category_name}}
                </td>
                <td>
                    @if ( Auth::user()->role == 'Admin')
                        <div class="mt-4">
                            <form action="{{ route('editCategories',$category->id) }}" method="GET">
                                @csrf
                                @method('GET')

                                <button class="btn btn-primary btn-sm">Edit</button>
                            </form>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('categories.delete',$category->id) }}" method="POST">
                            @csrf
                            @method('POST')

                            <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endif
                </td>
            </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
