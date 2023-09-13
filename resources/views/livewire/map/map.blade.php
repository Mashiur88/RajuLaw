<x-slot name="title">
    {{ $page_title }}
</x-slot>

<div class="row g-4 mb-4">
    <div class="col-lg-12 mb-12 order-0">
        <div class="card">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $page_title }}</h5>
                    <form wire:submit.prevent='updateSelectedCountry'>
                        <div class="grid-container">
                            @foreach($countryCodes as $temp)
                                <label class="checkbox-label">
                                    <input type="checkbox"
                                           class="form-check-input m-2"
                                           wire:model="selected"
                                           value="{{ $temp->key }}">
                                    {{ $temp->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-lg " type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Display 5 checkboxes per row */
        grid-gap: 10px; /* Adjust the gap between checkboxes as needed */
    }

    .checkbox-label {
        display: flex;
        align-items: center;
    }
</style>
