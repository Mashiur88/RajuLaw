<x-slot name="title">
    {{ $page_title }}
</x-slot>

{{-- search card --}}
<div>
    <a class="btn btn-primary" href="{{ route('admin.create_legal_fees') }}">Create</a>
    <div class="card">
        <h5 class="card-header">{{ $page_title }}</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Createed At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($members as $key => $member)
                        <tr>
                            <td><strong>{{ $key + 1 }}</strong></td>
                            <td>{{ $member->name }}</td>
                            <td><span
                                    class="badge bg-label-primary me-1">{{ date_convertion($member['created_at']) }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.edit_legal_fees',$member->id) }}"><i class="bx bx-edit-alt me-1"></i>
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
            <div class="p-2">
                {{-- {{ $members->links() }} --}}
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
