<x-app-layout>
    <form method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Post" :value="__('Post')" />
            <x-text-input id="post" class="block mt-1 w-full" type="text" name="post" :value="old('post')" required />
            <x-input-error :messages="$errors->get('post')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Category" :value="__('Category')" />
            <select id="category_id" :value="old('category')" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <x-input-label for="Image" :value="__('Image')" />
            <input type="file" name="image" id="image">
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Create New Post') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
