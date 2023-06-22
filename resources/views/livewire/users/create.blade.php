@php
    $disabled = $errors->any() || empty($this->name) || empty($this->email) || empty($this->password) ? true : false;
@endphp
@push('css')
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
                    <x-form.input_field labelname="Email" for="email" wire:model.debounce.300ms='email'
                        type="email" />
                    <x-form.input_field labelname="Password" for="password" wire:model.debounce.300ms='password'
                        type="password" />
                    <x-form.button title="Save" type="submit" wire:loading.attr='disabled' :disabled="$disabled" />
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Please write description',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
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
