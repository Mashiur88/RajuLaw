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
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create New Item</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='store'>
                        <x-form.input_field labelname="Title" for="title" wire:model.debounce.300ms='title' />

                        <section style="border: 1px solid;padding:5px">
                            <h5>Section one</h5>
                            <hr>

                            <x-form.input_field labelname="Section one header" for="section_one_name"
                                wire:model.debounce.300ms='section_one_name' />

                            <hr>

                            @foreach ($section_one_input as $key => $value)
                                <div class="row">
                                    <div class="col-5">
                                        <x-form.input_field labelname="Lebel" for="lebel"
                                            wire:model="lebel.{{ $value }}" />
                                    </div>
                                    <div class="col-5">
                                        <x-form.input_field labelname="Tag/amount" for="tag"
                                            wire:model="tag.{{ $value }}" />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-label-primary btn-icon btn-sm" style="margin-top:35px"
                                            type="button" wire:click="section_one_remove({{ $key }})"><i
                                                class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach


                            <button class="btn btn-label-primary btn-icon btn-sm"
                                wire:click="section_one_add({{ $section_one_i }})" type="button"><i
                                    class="bx bx-plus"></i></button>

                        </section>

                        <section style="border: 1px solid;padding:5px">
                            <h5>Section two</h5>
                            <hr>

                            <x-form.input_field labelname="Section two header" for="section_two_name"
                                wire:model.debounce.300ms='section_two_name' />

                            <hr>

                            @foreach ($section_two_input as $key => $value)
                                <div class="row">
                                    <div class="col-5">
                                        <x-form.input_field labelname="Lebel" for="lebel"
                                            wire:model="lebel2.{{ $value }}" />
                                    </div>
                                    <div class="col-5">
                                        <x-form.input_field labelname="Tag/amount" for="tag"
                                            wire:model="tag2.{{ $value }}" />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-label-primary btn-icon btn-sm" style="margin-top:35px"
                                            type="button" wire:click="section_two_remove({{ $key }})"><i
                                                class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach


                            <button class="btn btn-label-primary btn-icon btn-sm"
                                wire:click="section_two_add({{ $section_two_i }})" type="button"><i
                                    class="bx bx-plus"></i></button>

                        </section>

                        <section style="border: 1px solid;padding:5px">
                            <h5>Notes</h5>
                            <hr>

                            <x-form.input_field labelname="Section three header" for="section_three_name"
                                wire:model.debounce.300ms='section_three_name' />

                            <hr>

                            @foreach ($section_three_input as $key => $value)
                                <div class="row">
                                    <div class="col-5">
                                        <x-form.input_field labelname="Lebel" for="lebel"
                                            wire:model="lebel3.{{ $value }}" />
                                    </div>
                                    <div class="col-5">
                                        <x-form.input_field labelname="Tag/amount" for="tag"
                                            wire:model="tag3.{{ $value }}" />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-label-primary btn-icon btn-sm" style="margin-top:35px"
                                            type="button" wire:click="section_three_remove({{ $key }})"><i
                                                class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach


                            <button class="btn btn-label-primary btn-icon btn-sm"
                                wire:click="section_three_add({{ $section_three_i }})" type="button"><i
                                    class="bx bx-plus"></i></button>

                        </section>
                        <x-form.button title="Save" type="submit" class="mt-3"
                            wire:loading.attr='disabled' :disabled="$disabled" />
                </div>
            </div>
        </div>
    </div>
</div>
