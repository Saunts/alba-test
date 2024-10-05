<x-app-layout>
    <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Post" :value="__('Post')" />
            <x-text-input id="post" class="block mt-1 w-full" type="text" name="post" :value="$post->post" required />
            <x-input-error :messages="$errors->get('post')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Category" :value="__('Category')" />
            <select id="category_id" :value="old('category')" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->categories_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <x-input-label for="Image" :value="__('Image')" />
            <input type="file" name="image" id="image">
            <div class="mt-4">
                <img src="{{ asset($post->image) }}" alt="" style="max-height: 1000px; max-width:1000px">
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Post') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
