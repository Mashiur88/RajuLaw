<x-slot name="title">
    {{ $page_title }}
</x-slot>
<div class="blog-single-page">
    <!-- Slider Section -->
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2>{{ $post['title'] }}</h2>
                </div>
            </div>
        </div>
    </section>


    <!-- service content section -->
    <section class="service-content py-5 mb-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-9">
                    <img class="" src="{{ asset('storage/' . $post['banner_image']) }}">
                    <h2 class="blue">{{ $post['title'] }}</h2>
                    <p>{!! $post['desc'] !!}</p>
                </div>

                <!-- sidebar -->
                <div class="col-md-3">
                    <div class="service-sidebar">

                        <div class="bg-blue widget">
                            <a href="contact.html"></a>
                            <h3>Need help?</h3>
                            <p>Call us from anywhere and anytime around the world. We are here to support and advise you
                                24 hours.</p>
                            <div style="margin-top:50px;">Get help <img
                                    src="{{ asset('assets/frontend/img/widget/next_arrow_icon.png') }}">
                            </div>
                            <img src="{{ asset('assets/frontend/img/widget/support_icon.png') }}">
                        </div>

                        <div class="bg-red widget">
                            <a href="contact.html"></a>
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



    <div style="height:100px"></div>



@include('frontend.pasges.home_missle_section')
</div>
