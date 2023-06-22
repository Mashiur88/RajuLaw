<div class="mb-3">
    <label class="form-label">{{ $labelname }}</label>
    <input {{ $attributes->class(['form-control'])->merge(['type'=>'text','placeholder'=>'Please enter '.$labelname]) }}>
    @if(isset($for))
        @error($for)
            <div class="invalid-feedback" style="display:block">{{ $errors->first($for) }}</div>
        @enderror
    @endif
</div>

