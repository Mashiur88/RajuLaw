@php
    $disabled = $errors->any() ? true : false;
@endphp
@push('css')
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
            <x-alert />
            <form wire:submit.prevent='update'>
                @foreach ($contact_info as $key => $data)
                    <div class="card-body">
                        <x-form.input_field labelname="{{ $data['name'] }}" for="{{ $data['name'] }}"
                            wire:model.debounce.300ms='contact_info.{{ $key }}.name' />

                        <x-form.input_field labelname="" for="{{ $data['address'] }}"
                            wire:model.debounce.300ms='contact_info.{{ $key }}.address' />

                        <x-form.input_field labelname="" for="{{ $data['phone'] }}"
                            wire:model.debounce.300ms='contact_info.{{ $key }}.phone' />

                        <x-form.input_field labelname="" for="{{ $data['map'] }}"
                            wire:model.debounce.300ms='contact_info.{{ $key }}.map' />
                    </div>
                @endforeach
                <x-form.button title="Update" type="submit" wire:loading.attr='disabled' :disabled="$disabled" />
            </form>
        </div>
    </div>
</div>

@push('js')
@endpush
