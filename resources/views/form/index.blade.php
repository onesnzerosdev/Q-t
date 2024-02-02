<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis eius, iusto dolores aliquid culpa praesentium
        cupiditate quas. Perferendis quidem incidunt laboriosam, omnis deserunt, sequi, obcaecati cumque rerum est
        praesentium soluta!
        <form action="{{ route('formfields.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <select name="category_id" id="category_id" class="form-select w-full py-2 px-3 border rounded">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <div id="addFieldsButton">Add Fields</div>
            </div>

            <div id="fieldsContainer"></div>


            <div class="mb-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#fieldsContainer').on('input', '.label', function() {
                var labelValue = $(this).val().toLowerCase().replace(/\s+/g, '_');
                $(this).closest('.fields-group').find('.input_name').val(labelValue);
            });

            var addButton = $('#addFieldsButton');
            var fieldsContainer = $('#fieldsContainer');

            addButton.on('click', function() {
                var newFieldsGroup = $('<div class="fields-group flex flex-wrap gap-4">' +
                    '<div class="w-full lg:w-1/2">' +
                    '<label for="label" class="block text-gray-700 text-sm font-bold mb-2">Label</label>' +
                    '<input type="text" name="label[]" class="label form-input w-full py-2 px-3 border rounded">' +
                    '</div>' +
                    '<div class="w-full lg:w-1/2">' +
                    '<label for="input_name" class="block text-gray-700 text-sm font-bold mb-2">Input Box</label>' +
                    '<input type="text" name="input_name[]" class="input_name form-input w-full py-2 px-3 border rounded">' +
                    '</div>' +
                    '</div>');

                fieldsContainer.append(newFieldsGroup);
            });
        });
    </script>

</x-app-layout>
