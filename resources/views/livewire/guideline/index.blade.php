<x-slot name="title">
    {{ $page_title }}
</x-slot>

{{-- search card --}}
<div>
    <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <form class="card-body">
            <div class="row g-3">
                <div class="col-md-1">
                    <label class="form-label">Per Page</label>
                    <select class="form-select" wire:model='perPage'>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="multicol-username">Search Anything</label>
                    <input type="text" class="form-control" wire:model.debounce.300ms='search'>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order By</label>
                    <select class="form-select" wire:model='orderBy'>
                        <option value="id">Id</option>
                        <option value="title">Title</option>
                        <option value="created_at">Time</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order formate</label>
                    <select class="form-select" wire:model='orderByAsc'>
                        <option value="1">Accesding</option>
                        <option value="0">Decending</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    {{-- table --}}
    <a class="btn btn-primary" href="{{ route('admin.create_guideline') }}">Create</a>
    <div class="card">
        <h5 class="card-header">{{ $page_title }}</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($all_data as $key => $data)
                        <tr>
                            <td><strong>{{ $key + 1 }}</strong></td>
                            <td>{{ $data->title }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ date_convertion($data->created_at) }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" 
                                        href="{{ route('admin.edit_guideline',$data->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            wire:click='deleteconfirm({{ $data->id }})'><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-2">
                {{ $all_data->links() }}
            </div>

        </div>
    </div>
</div>


@push('js')
    <script>
        Livewire.on('swal', function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('delete')
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
