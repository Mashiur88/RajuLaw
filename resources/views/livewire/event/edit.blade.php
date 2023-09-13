@php
    // $disabled = $errors->any() || empty($this->name) || empty($this->designation) ? true : false;
    $disabled = false;
@endphp
<x-slot name="title">
    {{ $page_title }}
</x-slot>
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"/>
@endpush
<div class="row justify-center">
    <div class="col-xl">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $page_title }}</h5>
            </div>
            <div class="card-body">
                <x-alert />
                <form wire:submit.prevent='update'>
                    <x-form.input_field labelname="Event Name" for="event_name" wire:model.debounce.300ms='event_name' />
                    <div class="mb-3">
                        <label for="eventDate" class="form-label">Event Date</label>   
                        <input type="date" name="event_date" id="eventDate" class="form-control" value="" wire:model.debounce.300ms='event_date'/>
                    </div>
                    <x-form.input_field labelname="Location" for="location" wire:model.debounce.300ms='location' />
                    <x-form.input_field labelname="Venue" for="venue" wire:model.debounce.300ms='venue' />
                    <x-form.input_field labelname="Event Organizer" for="event_organizer" wire:model.debounce.300ms='event_organizer' />
                    <x-form.textarea labelname="Description" for="event_description" id="eventDescription"
                        wire:model.debounce.300ms='event_description'/>
                    <div class="avatar avatar-md me-2">
                        <img src="{{ asset('storage/' . $banner_image) }}" alt="Avatar" class="rounded-circle" wire:model.debounce.300ms='banner_image'>
                    </div>
                    @if($upload_image)
                    <div class="avatar avatar-md me-2">
                        <img src="{{ $upload_image->temporaryUrl() }}" alt="Avatar" class="rounded-circle">
                    </div>
                    @endif
                    <x-form.input_field labelname="Upload banner image (957 x 848)" for="banner_image" type="file" wire:model.debounce.300ms='upload_image' />
                    <x-form.button title="Update" type="submit" wire:loading.attr='disabled'  :disabled="$disabled"/>
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
            $('#eventDescription').summernote({
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
                        @this.set('event_description', contents)
                    }
                }
            });
        });
    </script>
@endpush