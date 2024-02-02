<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        {{-- <form method="POST" action="{{ route('urls.store') }}">
            @csrf
            <input type="text" name="title" required maxlength="255" placeholder="{{ __('Title') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('title') }}" />
            <x-input-error :messages="$errors->store->get('title')" class="mt-2" />
            <input type="text" name="original_url" required maxlength="255" placeholder="{{ __('Original Url') }}"
                class="block w-full border-gray-300 mt-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('original_url') }}" />
            <x-input-error :messages="$errors->store->get('original_url')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        </form> --}}



        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="">Category</label>
            <input type="text" name="name" id="name">
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        </form>



    </div>
</x-app-layout>
