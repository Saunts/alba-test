<x-app-layout>
    <form method="POST" action="{{ route('categories.update', $categories->id) }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="Name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$categories->category_name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Category') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
