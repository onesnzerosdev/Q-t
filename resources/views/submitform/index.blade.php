<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Include Tailwind CSS styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form action="{{ route('submitforms.store') }}" method="POST" class="max-w-md mx-auto">
                @csrf

                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                    <select name="category_id" id="category_id" class="form-select w-full py-2 px-3 border rounded"
                        onchange="toggleFields()">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="fieldsContainer" class="mb-4">
                    <!-- Your initial set of fields goes here -->
                    @foreach ($fields as $item)
                        <div class="fields-group flex flex-wrap gap-4" data-category-id="{{ $item->category_id }}">
                            <div class="w-full lg:w-1/2">
                                <label for="{{ $item->input_name }}"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ $item->label }}</label>
                                <input type="text" name="{{ $item->input_name }}"
                                    class="form-input w-full py-2 px-3 border rounded">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mb-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>

        <script>
            function toggleFields() {
                var selectedCategoryId = document.getElementById('category_id').value;
                var fieldContainers = document.querySelectorAll('.fields-group');

                fieldContainers.forEach(function(container) {
                    var category = container.getAttribute('data-category-id');
                    container.style.display = (category == selectedCategoryId || category == 0) ? 'block' : 'none';
                });
            }

            // Initial toggle on page load
            toggleFields();
        </script>

    </div>
</x-app-layout>
