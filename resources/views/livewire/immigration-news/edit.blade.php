@php
    $disabled = $errors->any() || empty($this->title) || empty($this->banner_image) || empty($this->desc) ? true : false;
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
                <form wire:submit.prevent='update'>
                    <x-form.input_field labelname="Title" for="title" wire:model.debounce.300ms='title' />
                    <div class="avatar avatar-md me-2">
                        <img src="{{ asset('storage/' . $banner_image) }}" alt="Avatar" class="rounded-circle">
                    </div>
                    <x-form.input_field labelname="Upload banner image" for="banner_image" type="file"
                        wire:model.debounce.500ms='banner_image' />
                    <x-form.textarea labelname="Description" for="desc" id="summernote"
                        wire:model.debounce.300ms='desc' />
                    <x-form.button title="Update" type="submit" wire:loading.attr='disabled' :disabled="$disabled" />
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
