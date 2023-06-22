<div class="mb-3" wire:ignore>
    <label class="form-label">{{ $labelname }}</label>
    <textarea {{ $attributes->class(['form-control'])->merge(['placeholder' => 'Please enter ' . $labelname]) }}></textarea>
    @if(isset($for))
        @error($for)
            <div class="invalid-feedback" style="display:block">{{ $errors->first($for) }}</div>
        @enderror
    @endif
</div>
