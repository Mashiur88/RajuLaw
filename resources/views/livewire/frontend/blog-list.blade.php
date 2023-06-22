<x-slot name="title">
    {{ $page_title }}
</x-slot>
@push('css')
    <style>
        .page-header-section {
            background-color: {{ $type == 'immigration' ? '#ffebea' : '' }};
            padding-top: 200px;
            padding-bottom: 50px;
        }

        .page-header-section {
            background-color: #08508a;
            background-image: url({{ $type == 'immigration' ? asset("assets/frontend/img/blog-page-bg.png") : ''  }});
            background-size: cover;
            background-position: center bottom;
            min-height: 480px;
        }
    </style>
@endpush
<div class="blog-page">
    <!-- Slider Section -->
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 style="color:white">{{ $page_title }}</h2>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog content section -->
    <section class="blog-content py-5 mt-5 mb-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">

                        @foreach ($list_data as $key=>$data)
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="post-box p-0 white-shadow-box">
                                    <a href="{{ route('blog_single',['type'=>$type,'slag'=>$data['slag']]) }}"><img class="thumb" src="{{ asset('storage/' . $data['banner_image']) }}"></a>
                                    <div style="padding: 20px; margin-top: -30px;height:245px">
                                        <p><small><i
                                                    class="icofont-clock-time"></i> {{ date_convertion($data['created_at']) }}
                                            </small></p>
                                        <a href="{{ route('blog_single',['type'=>$type,'slag'=>$data['slag']]) }}"><h4>{{ $data['title'] }}</h4></a>

                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 100, $end = '') }}
                                            <a class="red" href="{{ route('blog_single',['type'=>$type,'slag'=>$data['slag']]) }}">Learn More...</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                {{ $list_data->links() }}
                </div>

                <!-- sidebar -->
                <div class="col-md-3">
                    <div class="service-sidebar">

                        <div class="bg-blue widget">
                            <a href="{{ route('contact_us') }}"></a>
                            <h3>Need help?</h3>
                            <p>Call us from anywhere and anytime around the world. We are here to support and advise
                                you 24 hours.</p>
                            <div style="margin-top:50px;">Get help <img
                                    src="{{ asset('assets/frontend/img/widget/next_arrow_icon.png') }}">
                            </div>
                            <img src="{{ asset('assets/frontend/img/widget/support_icon.png') }}">
                        </div>

                        <div class="bg-red widget">
                            <a href="{{ route('blog_list','guideline') }}"></a>
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


@include('frontend.pasges.home_missle_section')

</div>
