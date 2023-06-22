<div class="col-12">
    <div class="card">
        <h5 class="card-header">{{ $labelname }}</h5>
        <div class="card-body">
            <div id="full-editor" wire:model='desc'>

            </div>
            @if (isset($for))
                @error($for)
                    <div class="invalid-feedback" style="display:block">{{ $errors->first($for) }}</div>
                @enderror
            @endif
        </div>
    </div>
</div>

