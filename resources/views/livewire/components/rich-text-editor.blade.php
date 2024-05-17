@props([
    'id' => null,
    'model' => null,
    'nameOfColumn' => null,
    'details' => '',
])

<div id="rich-text-modal" class="modal" style="display:none;">
    <div class="bg-gray-100 bg-opacity-75 fixed z-50 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center h-full">
            <div class="max-w-screen-lg w-full mx-auto p-4">
                <button class="close-modal absolute top-0 right-0 m-4 text-white hover:text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6 bg-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="modal-content">
                    <textarea id="summernote" class="summernote" style="background-color: white;"></textarea>

                    <form id="summernoteForm" action="{{ route('summernote.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="form-id">
                        <input type="hidden" name="model" id="form-model">
                        <input type="hidden" name="nameOfColumn" id="form-column">
                        <input type="hidden" name="summernoteContent" id="form-content">

                        <div class="flex justify-between mt-10">
                            <div></div>
                            <button type="submit" onclick="saveSummernote()" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">{{ __('ui_text.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .note-editor .note-editable {
            background-color: white !important;
        }
    </style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        var summerNoteText = {};

        // Initialize Summernote
        $('#summernote').summernote({
            placeholder: 'Enter Here',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['height', ['height']],
                ['para', ['paragraph']],
                ['view', ['codeview']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    var projectId = $('#form-id').val();
                    summerNoteText[projectId] = contents;
                }
            }
        });

        $('.open-modal').click(function() {
            var id = $(this).data('id');
            var model = $(this).data('model');
            var details = $(this).data('details');
            var column = $(this).data('column');

            $('#form-id').val(id);
            $('#form-model').val(model);
            $('#form-column').val(column);
            $('#summernote').summernote('code', details);
            $('#rich-text-modal').show();
        });

        // Close modal
        $('.close-modal').click(function() {
            $('#rich-text-modal').hide();
        });
    });

    function saveSummernote() {
        var projectId = $('#form-id').val();
        var content = $('#summernote').summernote('code');
        $('#form-content').val(content);

        $('#summernoteForm').submit();
    }
</script>
@endpush
