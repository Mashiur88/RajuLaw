@php
    
    $disabled = $errors->any() || empty($this->name) || empty($this->image) || empty($this->designation) ? true : false;
    // $disabled = false;
@endphp
<x-slot name="title">
    {{ $page_title }}
</x-slot>
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
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
                    <x-form.input_field labelname="Designation" for="designation" wire:model.debounce.300ms='designation' />
                    <x-form.input_field labelname="Email" for="email" wire:model.debounce.300ms='email' />
                    <x-form.input_field labelname="Phone Number" for="phone_number" wire:model.debounce.300ms='phone_number' />
                    <x-form.input_field labelname="Branch" for="branch" wire:model.debounce.300ms='branch' />
                    <x-form.input_field labelname="Languages" for="languages" wire:model.debounce.300ms='languages' />
                    <x-form.textarea labelname="Address" for="address" id="address"
                        wire:model.debounce.300ms='address'/>
                    <x-form.input_field labelname="Facebook Link" for="fb" wire:model.debounce.300ms='fb' />
                    <x-form.input_field labelname="Twitter Link" for="twt" wire:model.debounce.300ms='twt' />
                    <x-form.input_field labelname="linkdin Link" for="in" wire:model.debounce.300ms='in' />
                    <x-form.textarea labelname="About" for="about" id="summernote"
                        wire:model.debounce.300ms='about'/>
                    <x-form.textarea labelname="Attorny Note" for="attorny_note" id="attorny_note"
                        wire:model.debounce.300ms='attorny_note'/>
                    @if($image)
                        <div class="avatar avatar-md me-2">
                            <img src="{{ $image->temporaryUrl() }}" alt="Avatar" class="rounded-circle">
                        </div>
                    @endif
                    <x-form.input_field labelname="Upload profile image (643 x 700)" for="image" type="file" wire:model.debounce.300ms='image' />
                    <x-form.button title="Save" type="submit" wire:loading.attr='disabled' :disabled="$disabled" />
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
            $('#attorny_note').summernote({
                placeholder: '',
                tabsize: 2,
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('attorny_note', contents)
                    }
                }
            });
            
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
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('about', contents)
                    }
                }
            });

            $('#address').summernote({
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
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],

                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('address', contents)
                    }
                }
            });

            // $('.select2').select2();
        });
    </script>
@endpush


