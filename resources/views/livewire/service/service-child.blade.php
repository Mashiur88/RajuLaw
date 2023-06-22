@php
    $disabled = '';
@endphp

<x-slot name="title">
   Child of {{ $service->name }}
</x-slot>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        Child of "{{ $service->name }}"
    </h4>

        <x-alert />
    <div class="row">
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{ route('admin.create_service_child',$service->id) }}">Create</a>
            <br>
        </div>

        <div class="col-md-12">

                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Child name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($child_data as $key => $service)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $service->name }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.update_service',$service->id) }}">Edit</a>
                                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $service->id }})">Delete</button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
   
        </div>

    </div>
</div>
