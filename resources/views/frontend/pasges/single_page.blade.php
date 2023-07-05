@extends('frontend.app')
@section('title', 'Home')
@push('css')
@endpush
@section('content')

    <!-- Slider Section -->
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="red">{{ $data->parent_service->name }}</h2>
                    <h3>{{ $data['name'] }}</h3>
                </div>
                <div class="col-md-6 left-bottom">
                    <img class="w-auto" src="{{ asset('storage/' . $data['icon']) }}">
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section start -->
    <div class="container white-shadow-box p-2 service-nav-section">
        <div class="row">

            <div class="col">
                <ul class="nav navbar service-page-nav">
                    @foreach ($data->parent_service->chirld_services as $data2)
                        <li class="{{ $data2->id == $data->id ? 'active' : '' }}"><a
                                href="{{ route('service', ['service', $data2->id]) }}">{{ $data2->name }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <!-- service content section -->
    <section class="service-content py-5 mb-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <img class="" src="{{ asset('storage/' . $data['image']) }}">
                    {!! $data->desc !!}
                </div>

                <!-- sidebar -->
                <div class="col-md-4 col-lg-3">
                    <div class="service-sidebar">

                        <div class="bg-blue widget">
                            <a href="contact.html"></a>
                            <h3>Need help?</h3>
                            <p>Call us from anywhere and anytime around the world. We are here to support and advise you
                                24 hours.</p>
                            <div style="margin-top:50px;">Get help <img
                                    src="{{ asset('assets/frontend/img/widget/next_arrow_icon.png') }}"></div>
                            <img src="{{ asset('assets/frontend/img/widget/support_icon.png') }}">
                        </div>

                        <div class="bg-red widget">
                            <a href="guideline.html"></a>
                            <h3>Need Guidelines?</h3>
                            <p>for Undocumented Immigrant and more</p>
                            <div style="margin-top: 100px;">Guidelines <img
                                    src="{{ asset('assets/frontend/img/widget/next_arrow_icon.png') }}"></div>
                            <img src="{{ asset('assets/frontend/img/widget/Client_Vector.png') }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <div style="height:100px"></div>



    <!-- call to action section start -->
    <section class="cta-section">
        <div class="container text-center">
            <a class="btn btn-white rounded" href="#">Click here for Free NEW Evaluation <i
                    class="fas fa-angle-right ml-1"></i></a>
            <img src="assets/img/cta/Vector_boy.png">
        </div>
    </section>
    <!-- call to action section end -->

@endsection
@push('js')
@endpush
