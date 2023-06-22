<section class="cta-section">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center align-items-end order-2 order-lg-1">
                <img src="{{ asset('assets/frontend/img/cta/Vector_boy.png') }}" />
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center order-1 order-lg-2">
                <div class="d-flex flex-column btn-cover">
                    @php
                        $button_array_data = [19, 21, 23, 25];
                    @endphp
                    @foreach ($button_array_data as $key => $data)
                        @if (setting($data) != null)
                            <a class="btn btn-white rounded" href="{{ setting($data + 1) }}">{{ setting($data) }}
                                <i class="fas fa-angle-right ml-1"></i></a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
