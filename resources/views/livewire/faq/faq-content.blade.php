@php
    $disabled = null;
@endphp
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
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
            <div class="col-md-3 mb-3">
                <a class="btn btn-primary"
                    href="{{ route('admin.create_faq_content',$parent_id) }}">Create new content</a>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 75%">Title</th>
                                    <th style="width: 20%;text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($contents as $key => $service)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $service->title }}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('admin.edit_faq_content',['parent_id' => $parent_id,'child_id' => $service->id]) }}">Edit</a>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="delete({{ $service->id }})">Delete</button>
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
</div>

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        

    });
    </script>
@endpush
