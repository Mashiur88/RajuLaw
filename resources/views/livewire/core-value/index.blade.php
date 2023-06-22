@php
    $disabled = null;
@endphp

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
            <div class="col-md-3">
                <x-form.button title="Creat" type="button" wire:click="create" wire:loading.attr='disabled'
                    :disabled="$disabled" class="mb-2" />
                <br>
            </div>

            <div class="col-md-12">
                @if ($edit_mode)
                    <div>
                        <form wire:submit.prevent='update'>
                            <x-form.input_field labelname="title" for="title"
                                wire:model.debounce.300ms='edit_data.title' />

                            <x-form.textarea labelname="Description" for="desc"
                                wire:model.debounce.300ms='edit_data.desc' />

                            <div class="avatar avatar-md me-2">
                                <img src="{{ asset('storage/' . $edit_data['icon']) }}" alt="Avatar" class="rounded">
                            </div>

                            <x-form.input_field type="file" labelname="icon" for="icon"
                                wire:model.debounce.300ms='edit_icon' />

                            <x-form.button title="Update" type="submit" wire:loading.attr='disabled' :disabled="$disabled"
                                required />

                            <button class="btn btn-dark" type="button" wire:click="back">Back</button>
                        </form>
                    </div>
                @endif


                @if ($create_mode)
                    <div>
                        <form wire:submit.prevent='store'>
                            <x-form.input_field labelname="title" for="title" wire:model.debounce.300ms='title' />

                            <x-form.textarea labelname="Description" for="desc"
                                wire:model.debounce.300ms='desc' />

                            <x-form.input_field type="file" labelname="icon" for="icon"
                                wire:model.debounce.300ms='icon' />


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
                                        <th>Desc</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($all_data as $key => $service)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->desc }}</td>
                                            <td> <img src="{{ asset('storage/' . $service['icon']) }}" alt="Avatar"
                                                    class="rounded avatar-xs"></td>
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
