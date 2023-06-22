@php
    $disabled = $errors->any() || empty($this->name) || empty($this->email) ? true : false;
@endphp
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
                    <x-form.input_field labelname="Name" for="name" wire:model.debounce.300ms='name' />
                    <x-form.input_field labelname="Email" for="email" wire:model.debounce.300ms='email'
                        type="email" />
                    <x-form.input_field labelname="Password" for="password" wire:model.debounce.300ms='password'
                        type="password" />
                    <x-form.button title="Save" type="submit" wire:loading.attr='disabled' :disabled="$disabled"/>
                </form>
            </div>
        </div>
    </div>
</div>
