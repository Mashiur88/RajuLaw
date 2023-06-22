@if (session()->has('message'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
