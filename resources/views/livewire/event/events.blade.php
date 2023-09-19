<x-slot name="title">
    {{ $page_title }}
</x-slot>
@push('css')
<style>
.length{
    min-height: 200px;
    padding: 10px;
}
</style>
@endpush
<div>
    {{-- table --}}
    <a class="btn btn-primary" href="{{ route('admin.create.event') }}">Create Event</a>
    <div class="card mt-3">
        <h5 class="card-header">{{ $page_title }}</h5>
        <div class="table-responsive text-nowrap length">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th class="text-center">Event Date</th>
                        <th class="text-center">Venue</th>
                        <th class="text-center">Event Organizer</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if(!empty($events))
                        @foreach ($events as  $event)
                            <tr>
                                <td>{{ $event['event_name'] }}</td>
                                <td class="text-center"><span
                                    class="badge bg-label-primary me-1">{{ date_convertion($event['event_date']) }}</span>
                                </td>
                                <td>{{ $event['venue'] }}</td>
                                <td class="text-center">
                                    {{ $event['event_organizer'] }}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.edit.event', $event['id']) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                wire:click='deleteconfirm({{ $event['id'] }})'><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{-- <div class="p-2">
                {{ $members->links() }}
            </div> --}}

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