<x-slot name="title">
    About Us
</x-slot>

<div>
    <!-- Slider Section -->
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="red">About Us</h2>
                    <h3>Raju Law</h3>
                </div>
                <div class="col-md-6 left-bottom">
                    <img class="w-auto" src="{{ asset('assets/frontend/img/service/family_icon.png') }}">
                </div>
            </div>
        </div>
    </section>

    <section class="service-content py-5 mb-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    {!! $about_us !!}
                </div>

                <!-- sidebar -->
                <div class="col-md-4 col-lg-3">
                    <div class="service-sidebar">

                        <div class="bg-blue widget">
                            <a href="{{ route('contact_us') }}"></a>
                            <h3>Need help?</h3>
                            <p>Call us from anywhere and anytime around the world. We are here to support and advise you
                                24 hours.</p>
                            <div style="margin-top:50px;">Get help <img
                                    src="{{ asset('assets/frontend/img/widget/next_arrow_icon.png') }}">
                            </div>
                            <img src="{{ asset('assets/frontend/img/widget/support_icon.png') }}">
                        </div>

                        <div class="bg-red widget">
                            <a href="{{ route('blog_list', 'guideline') }}"></a>
                            <h3>Need Guidelines?</h3>
                            <p>for Undocumented Immigrant and more</p>
                            <div style="margin-top: 100px;">Guidelines <img
                                    src="{{ asset('assets/frontend/img/widget/next_arrow_icon.png') }}">
                            </div>
                            <img src="{{ asset('assets/frontend/img/widget/Client_Vector.png') }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="team-members-section pt-5 pb-5">
        <div class="container">

            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title pt-5 pb-5">
                    <h4 class="red" style="font-size: 40px;font-weight: 500;">Our Core Values</h4>
                </div>
            </div>

        </div>
        <div class="container mt-5 mb-5 pb-5">
            <div class="row">
                @foreach ($core_valus as $data)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="core-box white-shadow-box">
                            <img src="{{ asset('storage/' . $data['icon']) }}">
                            <h3>{{ $data->title }}</h3>
                            <h5>{{ $data->desc }}</h5>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>


    <div style="height:100px"></div>



    @include('frontend.pasges.home_missle_section')

</div>
