@php
    $disabled = null;
@endphp
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
<x-slot name="title">
    {{ $page_title }}
</x-slot>
<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            {{ $page_title }}
        </h4>

        <x-alert />
        <div class="row">
            @if (!$edit_mode && !$create_mode)
                <div class="col-md-3 mb-3">
                    <x-form.button title="Create new content" type="button" wire:click="create"
                        wire:loading.attr='disabled' :disabled="$disabled" />
                    <br>
                </div>
            @endif

            <div class="col-md-12">
                @if ($edit_mode)
                    <div>
                        <form wire:submit.prevent='parent_update'>
                            <x-form.input_field labelname="title" for="title"
                                wire:model.debounce.300ms='edit_parent_date.title' />
                                
                            <x-form.textarea labelname="desc" for="desc"
                                wire:model.debounce.300ms='edit_parent_date.desc' />

                            <x-form.button title="Update" type="submit" wire:loading.attr='disabled' :disabled="$disabled"
                                required />

                            <button class="btn btn-dark" type="button" wire:click="back">Back</button>
                        </form>
                    </div>
                @endif


                @if ($create_mode)
                    <div>
                        <form wire:submit.prevent='store'>
                            <x-form.input_field labelname="title" for="title"
                                wire:model.debounce.300ms='title' required/>

                            <x-form.textarea labelname="desc" for="desc" id="desc"
                                wire:model.debounce.300ms='desc' required/>

                            <x-form.button title="Save" type="submit" wire:loading.attr='disabled' :disabled="$disabled"
                                required />

                            <button class="btn btn-dark" type="button" wire:click="back">Back</button>
                        </form>
                    </div>
                @endif


                @if (!$edit_mode && !$create_mode)
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($contents as $key => $service)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $service->title }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click="edit_parent({{ $service->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="delete({{ $service->id }})">Delete</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

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
            $('#desc').summernote({
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

            // $('.select2').select2();
        });
    </script>
@endpush
