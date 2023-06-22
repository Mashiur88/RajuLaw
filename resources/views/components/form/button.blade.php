<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }} @if($disabled) disabled @endif >

    <span wire:loading.remove>{{ $title }}</span>
    <span wire:loading><span class="spinner-border me-1" role="status" aria-hidden="true"></span> Loading...</span>
</button>
