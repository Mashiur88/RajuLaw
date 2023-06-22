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
                    <div class="d-flex justify-content-md-between">

                        <div>
                            <a href="javascript:void(0)" class="btn btn-primary text-nowrap" wire:click='add'>
                                <i class="bx bx-plus me-1"></i>Add
                            </a>
                        </div>
                    </div>

                    <ul class="list-unstyled my-4">
                        @foreach ($testimonials as $data)
                            <div class="d-flex align-items-start">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('storage/' . $data['image']) }}" class="rounded-circle">
                                    </div>
                                    <div class="me-2">
                                        <li class="mb-3">
                                            <a href="#" class="d-flex fw-semibold"
                                                wire:click='edit({{ $data->id }})'>
                                                <i class="bx bx-chevron-right scaleX-n1-rtl text-muted me-1"></i>
                                                {{ $data['url'] }}
                                            </a>
                                        </li>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-label-primary btn-icon btn-sm"><i class="bx bx-edit"
                                            wire:click='edit({{ $data->id }})'></i></button>
                                    <button class="btn btn-label-primary btn-icon btn-sm"><i class="bx bx-trash"
                                            wire:click='delete({{ $data->id }})'></i></button>
                                </div>
                            </div>
                        @endforeach
                    </ul>

                    @if ($add_input)
                        <div class="card mb-6">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $update_mode ? 'update' : 'Add' }} Tech</h5>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent='{{ $update_mode ? 'update' : 'store' }}'>
                                    <div class="avatar me-3">
                                        <img src="{{ asset('storage/' . $image) }}" class="rounded-circle">
                                    </div>
                                    <x-form.input_field labelname="Image" for="image"
                                        wire:model.debounce.300ms='image' type='file' />
                                    <x-form.input_field labelname="Url" for="url"
                                        wire:model.debounce.300ms='url' />
                                    <x-form.button title="{{ $update_mode ? 'Update' : 'Save' }}" type="submit"
                                        wire:loading.attr='disabled' :disabled="$disabled" />
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
