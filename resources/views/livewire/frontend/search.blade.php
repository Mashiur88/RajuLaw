<x-slot name="title">
    {{ $page_title }}
</x-slot>
<div class="blog-single-page">
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2>{{ $page_title }}</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-content py-5 mt-5 mb-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($search_data as $key => $data)
                            @if ($data['table_name'] == 'faq_child')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['title'] }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('faq') }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data['table_name'] == 'immigration_news')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['title'] }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('blog_single', ['type' => 'immigration', 'slag' => $data['slag']]) }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data['table_name'] == 'guideline')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['title'] }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('blog_single', ['type' => 'guideline', 'slag' => $data['slag']]) }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data['table_name'] == 'service_chield')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['name'] }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('service', ['parent_slag' => '', 'slag' => $data['slag']]) }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data['table_name'] == 'services')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['name'] }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('service', ['parent_slag' => 'guideline', 'slag' => $data['slag']]) }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data['table_name'] == 'team')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['name'] ."  ".$data['designation']  }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['about']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('team') }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data['table_name'] == 'legal_fees_child')
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>{{ $data['name'] ."  ".$data['designation']  }}</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['about']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('team') }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 col-lg-12 mb-5">
                                    <div class="post-box p-0 white-shadow-box">
                                        <div style="padding: 20px; margin-top: -30px;height:245px">
                                            <p><small><i class="icofont-clock-time"></i>
                                                    {{ date_convertion($data['created_at']) }}
                                                </small></p>
                                            <h4>About us</h4>

                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 300, $end = '') }}
                                                <a class="red"
                                                    href="{{ route('about_us') }}">See Details
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- {{ $search_data->links() }} --}}
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
                            <a href="{{ route('blog_list', 'guideline') }}"></a>
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
