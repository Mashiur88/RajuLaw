@php
    // $disabled = $errors->any() || empty($this->name) || empty($this->designation) ? true : false;
    $disabled = false;
    // dd($this->name);
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
                    <input type="hidden" name="attorny_id" id="attorny_id" wire:model="attorny_id"/>
                    <x-form.input_field labelname="Duration1" for="duration1" wire:model.debounce.300ms='duration1' />
                    <x-form.input_field labelname="Duration2" for="duration2" wire:model.debounce.300ms='duration2' />
                    <x-form.input_field labelname="Duration3" for="duration3" wire:model.debounce.300ms='duration3' />
                    <x-form.input_field labelname="Charge1" for="charge1" wire:model.debounce.300ms='charge1' />
                    <x-form.input_field labelname="Charge2" for="charge2" wire:model.debounce.300ms='charge2' />
                    <x-form.input_field labelname="Charge3" for="charge3" wire:model.debounce.300ms='charge3' />
                    <x-form.textarea labelname="Note" for="note" id="note"
                        wire:model.debounce.300ms='note'/>
                    <label for="group_name" style="font-weight: 100;">Appointment Type</label>
                    <select class="form-select mb-2" wire:model="group_name">
                        <option>Select Appointment Type</option>
                        <option value="Free">Free</option>
                        <option value="Paid">Paid</option>
                    </select>

                    <x-form.button title="Update" type="submit"  wire:loading.attr='disabled'  :disabled="$disabled"/>
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
            
            $('#note').summernote({
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
                        @this.set('note', contents)
                    }
                }
            });

            // $('.select2').select2();
        });
    </script>
@endpush