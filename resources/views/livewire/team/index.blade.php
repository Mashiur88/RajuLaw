<x-slot name="title">
    {{ $page_title }}
</x-slot>

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
                        <option value="name">Name</option>
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

    <a class="btn btn-primary" href="{{ route('admin.team_create') }}">Create Team member</a>
    <div class="card">
        <h5 class="card-header">{{ $page_title }}</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Shorting</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Createed At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" wire:sortable="updateTaskOrder" wire:sortable.options="{ animation: 100 }">
                    @foreach ($members as  $member)
                        <tr wire:sortable.item="{{ $member->id }}" wire:key="task-{{ $member->id }}">
                            <td wire:sortable.handle><i class="bx bx-menu"></i></td>
                            <td wire:sortable.handle>{{ $member->name }}</td>
                            <td>{{ $member->designation }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $member['image']) }}" class="rounded avatar-xs" />
                            </td>
                            <td><span
                                    class="badge bg-label-primary me-1">{{ date_convertion($member['created_at']) }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.edit_member', $member->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            wire:click='deleteconfirm({{ $member->id }})'><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="p-2">
                {{ $members->links() }}
            </div> --}}

        </div>
    </div>
</div>


@push('js')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
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
