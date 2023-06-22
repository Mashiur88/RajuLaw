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
        <x-alert />
        <br>
        <div class="card mb-6">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Item</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='update'>
                        <x-form.input_field labelname="Title" for="title" wire:model.debounce.300ms='title' />

                        <section style="border: 1px solid;padding:5px">
                            <h5>Section one</h5>
                            <hr>

                            <x-form.input_field labelname="Section one header" for="section_one_name"
                                wire:model.debounce.300ms='section_one_name' />

                            <hr>

                            @foreach ($section_one_data as $index => $value)
                                <div class="row">
                                    <div class="col-5">
                                        <x-form.input_field labelname="Lebel" for="lebel"
                                            wire:model="section_one_data.{{ $index }}.lebel" required />
                                    </div>
                                    <div class="col-5">
                                        <x-form.input_field labelname="Tag/amount" for="tag"
                                            wire:model="section_one_data.{{ $index }}.tag" required />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-label-primary btn-icon btn-sm" style="margin-top:35px"
                                            type="button"
                                            wire:click="remove_update_seection({{ $index }},'first')"><i
                                                class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach


                            <button class="btn btn-label-primary btn-icon btn-sm"
                                wire:click="add_new_update_seection('first')" type="button"><i
                                    class="bx bx-plus"></i></button>

                        </section>

                        <section style="border: 1px solid;padding:5px">
                            <h5>Section two</h5>
                            <hr>

                            <x-form.input_field labelname="Section two header" for="section_two_name"
                                wire:model.debounce.300ms='section_two_name' />

                            <hr>

                            @foreach ($section_two_data as $index => $value)
                                <div class="row">
                                    <div class="col-5">
                                        <x-form.input_field labelname="Lebel" for="lebel"
                                            wire:model="section_two_data.{{ $index }}.lebel" required />
                                    </div>
                                    <div class="col-5">
                                        <x-form.input_field labelname="Tag/amount" for="tag"
                                            wire:model="section_two_data.{{ $index }}.tag" required />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-label-primary btn-icon btn-sm" style="margin-top:35px"
                                            type="button"
                                            wire:click="remove_update_seection({{ $index }},'second')"><i
                                                class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach


                            <button class="btn btn-label-primary btn-icon btn-sm"
                                wire:click="add_new_update_seection('second')" type="button"><i
                                    class="bx bx-plus"></i></button>

                        </section>

                        <section style="border: 1px solid;padding:5px">
                            <h5>Section three</h5>
                            <hr>

                            <x-form.input_field labelname="Section Three header" for="section_three_name"
                                wire:model='section_three_name' />

                            <hr>

                            @foreach ($section_three_data as $index => $value)
                                <div class="row">
                                    <div class="col-5">
                                        <x-form.input_field labelname="Lebel" for="lebel"
                                            wire:model="section_three_data.{{ $index }}.lebel" required />
                                    </div>
                                    <div class="col-5">
                                        <x-form.input_field labelname="Tag/amount" for="tag"
                                            wire:model="section_three_data.{{ $index }}.tag" required />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-label-primary btn-icon btn-sm" style="margin-top:35px"
                                            type="button"
                                            wire:click="remove_update_seection({{ $index }},'three')"><i
                                                class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach


                            <button class="btn btn-label-primary btn-icon btn-sm"
                                wire:click="add_new_update_seection('three')" type="button"><i
                                    class="bx bx-plus"></i></button>

                        </section>



                        <x-form.button title="Update" type="submit" class="mt-3" wire:loading.attr='disabled'
                            :disabled="$disabled" />
                </div>
            </div>

        </div>
    </div>
</div>
