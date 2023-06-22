@php
    $disabled = null;
@endphp

<x-slot name="title">
    {{ $page_title }}
</x-slot>
<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            All Faq
        </h4>

        <x-alert />
        <div class="row">
            @if (!$parent_edit_mode)
                <div class="col-md-3 mb-3">
                    <x-form.button title="Create Parent Item" type="button" wire:click="create"
                        wire:loading.attr='disabled' :disabled="$disabled" />
                    <br>
                </div>
            @endif

            <div class="col-md-12">
                @if ($parent_edit_mode)
                    <div>
                        <form wire:submit.prevent='parent_update'>
                            <x-form.input_field labelname="parent_name" for="parent_name"
                                wire:model.debounce.300ms='edit_parent_date.name' />

                            <div class="mb-3">
                                <label class="form-label">Select Parent</label>
                                <select class="form-select" aria-label="Default select example"
                                    wire:model.debounce.300ms='edit_parent_date.parent_id'>
                                    <option value="0" class="{{ $edit_item_parent == null ? 'red':'' }}">Itself as a parent</option>
                                    @foreach ($all_parent as $data)
                                        <option value="{{ $data->id}}" class="{{ $data->id == $edit_item_parent ? 'red':'' }}" >{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

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
                                wire:model.debounce.300ms='name' required/>

                            <div class="mb-3">
                                <label class="form-label">Select Parent</label>
                                <select class="form-select" aria-label="Default select example"
                                    wire:model.debounce.300ms='parent_id' required>
                                    <option value="0" selected>Itself as a parent</option>
                                    @foreach ($all_parent as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

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
                                        <th>Item name</th>
                                        <th>Parent Item</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->parent ? $service->parent->name : 'Its self a parent' }}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click="edit_parent({{ $service->id }})">Edit</button>

                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('admin.faq_content', $service->id) }}">Add content</a>
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
