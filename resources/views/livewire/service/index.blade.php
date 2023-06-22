@php
    $disabled = null;
@endphp

<x-slot name="title">
    {{ $page_title }}
</x-slot>
<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            All Services
        </h4>

        <x-alert />
        <div class="row">
            <div class="col-md-3">
                <x-form.button title="Create service" type="button" wire:click="create" wire:loading.attr='disabled'
                    :disabled="$disabled" />
                <br>
            </div>

            <div class="col-md-12">
                @if ($parent_edit_mode)
                    <div>
                        <form wire:submit.prevent='parent_update'>
                            <x-form.input_field labelname="parent_name" for="parent_name"
                                wire:model.debounce.300ms='edit_parent_date.name' />

                            <x-form.input_field type="color" labelname="Box color" for="box_color"
                                wire:model.debounce.300ms='edit_parent_date.box_color' />

                            <div class="avatar avatar-md me-2">
                                <img src="{{ asset('storage/' . $edit_parent_date['box_icon']) }}" alt="Avatar" class="rounded">
                            </div>

                            <x-form.input_field type="file" labelname="box_icon" for="box_icon"
                                wire:model.debounce.300ms='edit_icon' />

                            <x-form.button title="Update" type="submit" wire:loading.attr='disabled' :disabled="$disabled"
                                required />

                            <button class="btn btn-dark" type="button" wire:click="back">Back</button>
                        </form>
                    </div>
                @endif


                @if ($parent_create_mode)
                    <div>
                        <form wire:submit.prevent='store'>
                            <x-form.input_field labelname="parent_name" for="parent_name"
                                wire:model.debounce.300ms='name' />

                            <x-form.input_field type="color" labelname="Box color" for="box_color"
                                wire:model.debounce.300ms='box_color' />

                            <x-form.input_field type="file" labelname="box_icon" for="box_icon"
                                wire:model.debounce.300ms='box_icon' />


                            <x-form.button title="Save" type="submit" wire:loading.attr='disabled' :disabled="$disabled"
                                required />

                            <button class="btn btn-dark" type="button" wire:click="back">Back</button>
                        </form>
                    </div>
                @endif


                @if (!$parent_edit_mode && !$parent_create_mode)
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Parent name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $service->name }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click="edit_parent({{ $service->id }})">Edit</button>

                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('admin.chield_data', $service->id) }}">Add / all Sub
                                                    category</a>
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
