<x-slot name="title">
    {{ $page_title }}
</x-slot>
@push('css')
<style>
    section.slider-section {
        background-image: url({{ asset("assets/frontend/img/banner/Vector_Bg.png") }});
        background-position: bottom center;
        background-repeat: no-repeat;
    }

    .map-container{
        height:570px;
    }

    .map{
        width:100%; 
        height:100%;
        padding: 0px 15px;
    }

    svg{
        height: 520px;
    }

</style>
@endpush
<div>
    <!-- Slider Section -->
    <section class="slider-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="blue pt-5">US Immigration Law</h2>
                    <h2 class="red cd-headline clip"> and
                        <span class="cd-words-wrapper">
                            <b class="is-visible">{{ setting(36) }}</b>
                        </span>
                    </h2>
                    <a class="btn" href="{{ route('appointment') }}">{{ setting(32) }}<i
                            class="fas fa-angle-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section start -->
    <div class="container white-shadow-box px-5 mb-5" style="margin-top: -30px; border-radius: 200px;">
        <div class="row counter-row">

            <div class="col-md-4 col-sm-12 br-right">
                <div class="counter-box">
                    <span class="red"><span class="count">{{ setting(9) }}</span> %</span> <b
                        class="blue">Success Rate</b>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 br-right">
                <div class="counter-box">
                    <span class="red"><span class="count">{{ setting(10) }}</span> +</span> <b
                        class="blue">Total Case</b>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="counter-box">
                    <span class="red"><span class="count">{{ setting(11) }}</span> +</span> <b
                        class="blue">Total Month</b>
                </div>
            </div>

        </div>
    </div>

    <section>
        <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($event_slider as $event)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $event->id }}" class=""></li>
                    @endforeach
                    {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                </ol>
                <div class="carousel-inner">
                    @foreach($event_slider as $event)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('storage/' . $event->banner_images) }}" alt="First slide">
                        </div>
                    @endforeach
                    {{-- <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                    </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="second_section pb-3 mb-5 pb-5 mt-5">
        <div class="container px-5 mb-5">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h2 class="blue mb-5">{{ setting(40) }}</h2>
                </div>
            </div>
        </div>
        <div class="map-container">
            <div id="world-map" class="map">
                
                
                
            </div>      
        </div>
    </section>

    <section class="second_section pb-3 mb-5 pb-5">
        <div class="container px-5 mb-5">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h2 class="blue mb-5">{{ setting(12) }}</h2>
                </div>
            </div>
        </div>

        <div class="team-member-carousel">
            <div class="rewind animarq" id="rewind">

                @foreach ($team_member as $key => $data)
                    <!-- team item -->
                    <div class="team-item">
                        <div>
                            <img src="{{ asset('storage/' . $data['image']) }}">
                            <div class="team-meta">
                                <h3>{{ $data['name'] }}</h3>
                                <h5>{{ $data['designation'] }}</h5>
                                <a class="btn mfp-popup" href="#tpc-{{ $key + 1 }}">Details <i
                                        class="fas fa-angle-right ml-1"></i></a>
                                <div id="tpc-{{ $key + 1 }}" class="zoom-anim-dialog mfp-hide">
                                    <div class="tp-header">
                                        <div class="tp-img">
                                            <img src="{{ asset('storage/' . $data['image']) }}">
                                        </div>
                                        <div class="tp-meta">
                                            
                                            <h3>{{ $data['name'] }}</h3>
                                            <h5>{{ $data['designation'] }}</h5>
                                            <div class="social_icons">
                                                @if ($data['fb'])
                                                    <a href="{{ $data['fb'] }}"><i class="fab fa-facebook-f"></i></a>
                                                @endif

                                                @if ($data['twt'])
                                                    <a href="{{ $data['twt'] }}"><i class="fab fa-twitter"></i></a>
                                                @endif

                                                @if ($data['in'])
                                                    <a href="{{ $data['in'] }}"><i class="fab fa-linkedin"></i></a>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                    <div class="tp-body">
                                        <p>{!! $data->about !!}</p>
                                    </div>
                                    <a href="{{ route('appointment') }}" class="btn" 
                                                style="width: 50%;border-radius: 8px;margin:auto;display:flex;align-items:center;justify-content:center;" wire:click="team_details(10)">{{ setting(32) }} <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @break($key == 7)
                @endforeach

            </div>
        </div>


        <div class="container pt-5 mt-5">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h4 class="red" style="letter-spacing: 2px;font-size: 30px;font-weight: 500;">
                        {{ setting(13) }}
                    </h4>
                </div>
            </div>

            <div class="row mt-5" style="margin-bottom: -15px;">
                @foreach ($service_item as $key => $data)
                    <div class="col-md-4">
                        <div class="service-box {{ numberToWord($key + 1) }}" style="background:{{ $data['box_color'] }}">
                            @php
                                $image_key = $key + 1;
                            @endphp
                            <img src="{{ asset('storage/' . $data['box_icon']) }}" style="height:122px">
                            <h4>{{ $data['name'] }}</h4>
                            <ul class="navbar-nav">
                                @foreach ($data->chirld_services as $data2)
                                    <li>
                                        <i class="fa fa-angle-right"></i> <a
                                            href="{{ route('service', ['parent_slag'=>$data->slug,'slag'=>$data2->slag]) }}">{{ $data2['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.pasges.home_missle_section')

    <!-- FAQ section start -->
    <section class="faq-section pb-5">
        <div class="tab-header-section">
            <div class="container">
                <h2 class="blue faq-title">{{ setting(14) }}</h2>
            </div>
        </div>

        <div class="container">
            <nav style="margin-top: -77px">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($faqs as $data)
                        <a class="nav-link {{ $data['id'] == $selected_faq['id'] ? 'active' : '' }}" id="nav-one-tab"
                            data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one"
                            aria-selected="true"
                            wire:click='selected_faq({{ $data['id'] }})'>{{ $data['name'] }}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!-- tab 1 -->
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <div class="container pt-5">
                        <div id="accordion" class="accordion">
                            <div class="card mb-0">
                                @foreach ($selected_faq->content as $key => $data)
                                    <div class="card-header" data-toggle="collapse"
                                        href="#collapse{{ $key + 1 }}">
                                        <a class="card-title">
                                            {{ $key + 1 }}. {{ $data['title'] }}
                                        </a>
                                    </div>
                                    <div id="collapse{{ $key + 1 }}"
                                        class="card-body collapse {{ $key == 0 ? 'show' : '' }}"
                                        data-parent="#accordion">
                                        <p>
                                            {{ $data['desc'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center my-5">
            <a class="btn btn-white-alt mb-5" href="{{ route('faq') }}">View All
                FAQ
                <i class="fas fa-angle-right ml-1"></i></a>
        </div>
    </section>
    <!-- FAQ section end -->


    <section class="video-section grey-bg pt-5 pb-5">
        <div class="container">
            <div class="w-100 text-center">
                <div class="sec-title">
                    <h2 class="red">{{ setting(33) }}</h2>
                    <p class="blue">
                        U.S. Immigration Lawyer and Founder of Mahajan Law LLC.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="video-boxes row no-gutters" id="lightgallery">
        <div class="col-md-4 bg-blue">
            <a class="pt-3 popup-youtube" href="{{ $meet_raju[0]->video_url }}"><img
                    src="{{ asset('assets/frontend/img/video/play-button.png') }}" /></a>
            <h2>
                {{ $meet_raju[0]->title }}

            </h2>
            <p class="pb-3"> {{ $meet_raju[0]->short_name }}</p>
        </div>
        <div class="col-md-4">
            <img class="thmb" src="{{ asset('assets/frontend/img/video/img_1.png') }}" />
        </div>
        <div class="col-md-4 bg-blue">
            <a class="pt-3 popup-youtube" href="{{ $meet_raju[1]->video_url }}"><img
                    src="{{ asset('assets/frontend/img/video/play-button.png') }}" /></a>
            <h2>
                {{ $meet_raju[1]->title }}
            </h2>
            <p class="pb-3">{{ $meet_raju[1]->short_name }}</p>
        </div>
        <div class="col-md-4">
            <img class="thmb" src="{{ asset('assets/frontend/img/video/img_2.png') }}" />
        </div>
        <div class="col-md-4 bg-red">
            <a class="pt-3 popup-youtube" href="{{ $meet_raju[2]->video_url }}"><img
                    src="{{ asset('assets/frontend/img/video/play-button.png') }}" /></a>
            <h2>
                {{ $meet_raju[2]->title }}
            </h2>
            <p class="pb-3">{{ $meet_raju[2]->short_name }}</p>
        </div>
        <div class="col-md-4">
            <img class="thmb" src="{{ asset('assets/frontend/img/video/img_3.png') }}" />
        </div>

        <div class="container text-center my-5">
            <a class="btn btn-white-alt mb-5" href="">{{ setting(34) }}
                <i class="fas fa-angle-right ml-1"></i></a>
        </div>
    </section>

    <section class="video-section grey-bg pt-5 pb-5">
        <div class="container">
            <div class="w-100 text-center">
                <div class="sec-title">
                    <h2 class="blue mb-5 pb-5" style="font-weight: 500">
                        {{ setting(16) }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                @foreach ($immigration_news as $data)
                    <div class="col-md-4 mb-5">
                        <div class="post-box white-shadow-box">
                            <h4>{{ $data['title'] }}</h4>
                            <p>
                                <small><i
                                        class="icofont-clock-time"></i>{{ date_convertion($data['created_at']) }}</small>
                            </p>
                            <img src="{{ asset('storage/' . $data['banner_image']) }}" />
                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($data['desc']), 200, $end = '') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container text-center my-5">
            <a class="btn btn-white-alt mb-5"
                href="{{ route('blog_list', ['type' => 'immigration']) }}">{{ setting(28) }}
                <i class="fas fa-angle-right ml-1"></i></a>
        </div>
    </section>


    <section class="pt-5">
        <div class="container">
            <div class="w-100 text-center">
                <div class="sec-title">
                    <h2 class="blue">
                        {{ setting(15) }} <br />
                    </h2>
                </div>
            </div>
        </div>

        <div class="container pt-5 pb-5">
            <div class="clients-box">
                @foreach ($tech as $data)
                    <div class="client-img">
                        <img src="{{ asset('storage/' . $data['image']) }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="testimonial-section">
        <div class="contianer pb-5 mt-5">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h2 class="blue"><b>{{ setting(17) }}</b></h2>
                    <p class="red" style="letter-spacing: 2px;text-align:center">CLIENT TESTIMONIALS</p>
                </div>
            </div>
        </div>
        <div class="container testi-blocks pt-5 pb-5 grey-bg" style="border-radius: 20px">
            <div class="customize-tools">
                <ul class="thumbnails" id="customize-thumbnails">
                    @foreach ($testimonial as $data)
                        <li>
                            <img src="{{ asset('storage/' . $data['image']) }}" />
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="customize pt-5" id="customize">
                @foreach ($testimonial as $data)
                    <div class="testimonial-item text-center">
                        <div style="max-width: 500px; margin: auto">
                            <h4>{{ $data['name'] }}</h4>
                            <div class="ratings">
                                @for ($i = 0; $i < $data['rating']; $i++)
                                    <i class="icofont-star"></i>
                                @endfor
                            </div>
                            <p>
                                {{ $data['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <ul class="controls" id="customize-controls">
                <li class="prev">
                    <i class="icofont-arrow-left"></i>
                </li>
                <li class="next">
                    <i class="icofont-arrow-right"></i>
                </li>
            </ul>
        </div>
    </section>

</div>

@push('js')
    <script type="text/javascript">
        const div = document.querySelector("#rewind");
        const section = document.querySelector(".team-member-carousel");
        let currentX = 0;
        const targetX = -77;
        const step = 0.01;
        let isPlaying = true;
        section.addEventListener("mouseenter", function() {
            isPlaying = false;
        });
        section.addEventListener("mouseleave", function() {
            isPlaying = true;
        });

        function updatePosition() {
            if (!isPlaying) {
                window.requestAnimationFrame(updatePosition);
                return;
            }
            currentX -= step;
            div.style.transform = `translate3d(${currentX}%, 0px, 0px)`;
            if (currentX > targetX) {
                window.requestAnimationFrame(updatePosition);
            }
        }
        updatePosition();

        $(document).ready(function(){
            var gdpData = {   
                'BD': ' angladesh',
                'BN': 'Brunei',
                'MN': 'Mongolia',
                'BH': 'Bahrain',
                'BT': 'Bhutan',
                'HK': 'Hong Kong',
                'JO': 'Jordan',
                'PS': 'Palestine',
                'LB': 'Lebanon',
                'LA': 'Lao PDR',
                'TW': 'Taiwan',
                'TR': 'Turkey',
                'LK': 'Sri Lanka',
                'TL': 'Timor-Leste',
                'TM': 'Turkmenistan',
                'TJ': 'Tajikistan',
                'TH': 'Thailand',
                'XC': 'N. Cyprus',
                'NP': 'Nepal',
                'PK': 'Pakistan',
                'PH': 'Philippines',
                '99':  'Siachen Glacier',
                'AE': 'United Arab Emirates',
                'CN': 'China',
                'AF': 'Afghanistan',
                'IQ': 'Iraq',
                'JP': 'Japan',
                'IR': 'Iran',
                'AM': 'Armenia',
                'SY': 'Syria',
                'VN': 'Vietnam',
                'GE': 'Georgia',
                'IL': 'Israel',
                'IN': 'India',
                'AZ': 'Azerbaijan',
                'ID': 'Indonesia',
                'OM': 'Oman',
                'KG': 'Kyrgyzstan',
                'UZ': 'Uzbekistan',
                'MM': 'Myanmar',
                'SG': 'Singapore',
                'KH': 'Cambodia',
                'CY': 'Cyprus',
                'QA': 'Qatar',
                'KR': 'Korea',
                'KP': 'Dem. Rep. Korea',
                'KW': 'Kuwait',
                'KZ': 'Kazakhstan',
                'SA': 'Saudi Arabia',
                'MY': 'Malaysia',
                'YE': 'Yemen',
            }

            $('.carousel').carousel();
            // $('#world-map').vectorMap({
            //     map: 'world_mill_en',
            //     zoomOnScroll: false,
            //     scale: ['#C8EEFF', '#0071A4'],    //
            //     normalizeFunction: 'polynomial'
            // });

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                zoomOnScroll: false,
                series: {
                    regions: [{
                    values: gdpData,
                    scale: ['#C8EEFF', '#0071A4'],
                    normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function(e, el, code){
                    el.html(el.html()+' (GDP - '+gdpData[code]+')');
                }
            });
        });

    </script>
@endpush
