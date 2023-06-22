@php
    $disabled = false;
@endphp

<x-slot name="title">
    {{ $page_title }}
</x-slot>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        {{ $page_title }}
    </h4>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <x-alert />
            <div class="card overflow-hidden">
                <div class="card-body">

                    @if (!$update_mode)
                        @foreach ($fetch_data as $key => $data)
                            <div class="list-group">
                                <a href="javascript:void(0);"
                                    class="list-group-item list-group-item-action active">{{ $key }}</a>
                                @foreach ($data as $data2)
                                    <a href="javascript:void(0);"
                                        class="list-group-item list-group-item-action">{{ $data2->name }} <button
                                            class="btn btn-label-primary btn-icon btn-sm"><i class="bx bx-edit"
                                                wire:click='edit({{ $data2->id }})'></i></button></a>
                                                
                                @endforeach

                            </div>
                        @endforeach
                    @endif

                    @if ($update_mode)
                        <div class="card mb-6">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $update_mode ? 'update' : 'Add' }} {{ $name }}</h5>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent='{{ $update_mode ? 'update' : 'store' }}'>
                                    <x-form.input_field labelname="Name" for="name"
                                        wire:model.debounce.300ms='name' disabled />
                                    @if ($name == 'banner')
                                        <img src="{{ asset('storage/' . $value) }}" class="rounded avatar-xs" />
                                    @endif
                                    <x-form.input_field labelname="Value" for="value"
                                        wire:model.debounce.300ms='value'
                                        type="{{ $name == 'banner' ? 'file' : 'text' }}" />

                                    <x-form.button title="{{ $update_mode ? 'Update' : 'Save' }}" type="submit"
                                        wire:loading.attr='disabled' :disabled="$disabled" />

                                    <button class="btn btn-dark" type="button" wire:click="back">Back</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
