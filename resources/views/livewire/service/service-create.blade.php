@php
    $disabled = $errors->any() ? true : false;
@endphp

@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
<x-slot name="title">
    {{ $page_title }}
</x-slot>
<div class="row justify-center">
    <div class="col-xl">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $page_title }}</h5>
            </div>
            <div class="card-body">
                <x-alert />
                <form wire:submit.prevent='store'>
                    <x-form.input_field labelname="Name" for="name" wire:model.debounce.300ms='name' />
                    <x-form.input_field type="color" labelname="Color" for="color" wire:model.debounce.300ms='color' />
                    <img src="{{ asset('storage/' . $icon) }}" class="rounded mb-sm-0 mb-3 me-3" height="62"
                        width="62">
                    <x-form.input_field labelname="Upload profile icon (114 x 117)" for="icon" type="file"
                        wire:model.debounce.300ms='icon' />

                    <x-form.select-option labelname="Select Service" for="service_id" :items="$option_data"
                        :selecteddata="$service_id" />
                    <x-form.textarea labelname="Description" for="desc" id="summernote"
                        wire:model.debounce.300ms='desc' />
                    <x-form.button title="Update" type="submit" class="mt-3" wire:loading.attr='disabled'
                        :disabled="$disabled" />
                </form>
            </div>
        </div>
    </div>

</div>
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: '',
                tabsize: 2,
                height: 250,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                    ['insert', ['link', 'picture', 'video']],
                ],

                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('desc', contents)
                    }
                }
            });

            $('.select2').select2();
        });
    </script>
@endpush
