<div wire:ignore>
    <div class="mb-3">
        <label class="form-label">{{ $labelname }}</label>
        <select class="form-select" aria-label="Default select example" wire:model='{{ $for }}'>
            <option selected="" disabled>Open this select menu</option>
            @foreach ($items as $key => $data)
                <option value="{{ $key }}" {{ $selecteddata == $key ? 'selectedd' : '' }}>{{ $data }}
                </option>
            @endforeach
        </select>
    </div>
</div>
