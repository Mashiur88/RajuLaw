@extends('frontend.app')
@section('title', 'Home')
@push('css')
@endpush
@section('content')


    <!-- Slider Section -->
    <section class="slider-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="blue pt-5">US Immigration Law</h2>
                    <h2 class="red cd-headline clip"> and
                        <span class="cd-words-wrapper">
                             <b class="is-visible">Global Service</b>
                             <b class="is-hidden">Global Service</b>
                             <b class="is-hidden">Global Service</b>
                         </span>
                    </h2>
                    <a class="btn" href="{{ route('appointment') }}">Get an Appointment <i class="fas fa-angle-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section start -->
    <div class="container white-shadow-box px-5 mb-5" style="margin-top: -30px; border-radius: 200px;">
        <div class="row counter-row">

            <div class="col-md-4 col-sm-12 br-right">
                <div class="counter-box">
                    <span class="red"><span class="count">99.4</span> %</span> <b class="blue">Success Rate</b>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 br-right">
                <div class="counter-box">
                    <span class="red"><span class="count">857</span> +</span> <b class="blue">Total Case</b>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="counter-box">
                    <span class="red"><span class="count">270</span> +</span> <b class="blue">Total Month</b>
                </div>
            </div>

        </div>
    </div>

    <section class="second_section pb-3 mb-5 pb-5">
        <div class="container px-5 mb-5">

            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h2 class="blue mb-5">We Offer A <b>Client Focused</b> Approach</h2>
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
                                <h3>{{$data['name']}}</h3>
                                <h5>{{$data['designation']}}</h5>
                                <a class="btn mfp-popup" href="#tpc-{{ $key+1 }}">Details <i class="fas fa-angle-right ml-1"></i></a>
                                <div id="tpc-{{ $key+1 }}" class="zoom-anim-dialog mfp-hide">
                                    <div class="tp-header">
                                        <div class="tp-img">
                                            <img src="{{ asset('storage/' . $data['image']) }}">
                                        </div>
                                        <div class="tp-meta">
                                            <h3>{{$data['name']}}</h3>
                                            <h5>{{$data['designation']}}</h5>
                                            <div class="social_icons">
                                                <a href="{{$data['fb']}}"><i class="fab fa-facebook-f"></i></a>
                                                <a href="{{$data['twt']}}"><i class="fab fa-twitter"></i></a>
                                                <a href="{{$data['in']}}"><i class="fab fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tp-body">
                                        <p>{{$data->about}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="container pt-5 mt-5">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h4 class="red" style="letter-spacing: 2px;font-size: 30px;font-weight: 500;">OUR PRACTICE AREAS
                    </h4>
                </div>
            </div>

            <div class="row mt-5" style="margin-bottom: -15px;">
                @foreach($service_item as $key=>$data)
                    <div class="col-md-4">
                        <div class="service-box {{numberToWord($key+1)}}">
                            @php
                                $image_key = $key+1;
                            @endphp
                            <img src="{{asset("assets/frontend/img/service/icon_$image_key.png")}}">
                            <h4>{{$data['name']}}</h4>
                            <ul class="navbar-nav">
                                @foreach($data->chirld_services as $data2)
                                    <li>
                                        <i class="fa fa-angle-right"></i> <a href="{{route('service',['service',$data2->id])}}">{{$data2['name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- call to action section start -->
    <section class="cta-section">
        <div class="container text-center">
            <a class="btn btn-white rounded" href="#">Click here for Free NEW Evaluation <i
                        class="fas fa-angle-right ml-1"></i></a>
            <img src="{{asset("assets/frontend/img/cta/Vector_boy.png")}}">
        </div>
    </section>
    <!-- call to action section end -->

    <!-- FAQ section start -->
    <section class="faq-section pb-5">
        <div class="tab-header-section">
            <div class="container">
                <h2 class="blue faq-title">FAQ</h2>
            </div>
        </div>

        <div class="container">
            <nav style="margin-top: -77px;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($faqs as $key=>$data)
                        <a class="nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-{{$key+1}}" role="tab"
                           aria-controls="nav-{{$key+1}}" aria-selected="true">{{$data->name}}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach($faqs as $key=>$data)
                    <div class="tab-pane fade show active" id="nav-{{$key+1}}" role="tabpanel" aria-labelledby="nav-one-tab">
                        <div class="container pt-5">
                            <div id="accordion" class="accordion">
                                <div class="card mb-0">

                                    <div class="card-header" data-toggle="collapse" href="#collapseOne">
                                        <a class="card-title">
                                            1. How many LoRs are required for the I-140 petition?
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="card-body collapse show" data-parent="#accordion">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                            craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                                            heard of them accusamus labore sustainable VHS.
                                        </p>
                                    </div>

                                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion"
                                         href="#collapseTwo">
                                        <a class="card-title">
                                            2. I know quite a few industry experts, e.g., Deans of Lewis University & Embry
                                            Riddle Aeronautical University etc.
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                            craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                                            heard of them accusamus labore sustainable VHS.
                                        </p>
                                    </div>

                                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion"
                                         href="#collapseThree">
                                        <a class="card-title">
                                            3. What is the difference between dependent and independent LoRs?
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                            moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                            samus labore sustainable VHS.
                                        </div>
                                    </div>

                                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion"
                                         href="#collapseFour">
                                        <a class="card-title">
                                            4. How many independent LoRs am I supposed to obtain?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                            moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                            samus labore sustainable VHS.
                                        </div>
                                    </div>

                                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion"
                                         href="#collapseFive">
                                        <a class="card-title">
                                            5. Is the Raju Law Team going to assist in selecting the recommenders, or is it
                                            entirely up to me to do that?
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                            moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                            samus labore sustainable VHS.
                                        </div>
                                    </div>

                                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion"
                                         href="#collapseSix">
                                        <a class="card-title">
                                            7. Do I need to get your LoR service? Or Can I draft the letters myself?
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                            moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                            samus labore sustainable VHS.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- FAQ section end -->


    <section class="pt-5 pb-5">
        <div class="container pb-5">
            <div class="w-100 text-center">
                <div class="sec-title">
                    <h2 class="blue">We Use State of the Art Technology to <br> <b>Provide Best Service</b></h2>
                </div>
            </div>
        </div>

        <div class="container pt-5 pb-5">
            <div class="clients-box">
                <div class="client-img"><img src="assets/img/client/client_logo_1.png"></div>
                <div class="client-img"><img src="assets/img/client/client_logo_2.png"></div>
                <div class="client-img"><img src="assets/img/client/client_logo_3.png"></div>
                <div class="client-img"><img src="assets/img/client/client_logo_4.png"></div>
                <div class="client-img"><img src="assets/img/client/client_logo_5.png"></div>
                <div class="client-img"><img src="assets/img/client/client_logo_6.png"></div>
            </div>
        </div>
    </section>


    <section class="video-section grey-bg pt-5 pb-5">
        <div class="container">
            <div class="w-100 text-center">
                <div class="sec-title">
                    <h2 class="red">Meet <b>Raju Mahajan,</b> Esq.</h2>
                    <p class="blue">U.S. Immigration Lawyer and Founder of Mahajan Law LLC.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="video-boxes row no-gutters" id="lightgallery">
        <div class="col-md-4 bg-blue">
            <a class="pt-3 popup-youtube" href="//www.youtube.com/watch?v=WFkV3yD3k8A"><img
                        src="assets/img/video/play-button.png"></a>
            <h2>ChatGPT in Immigration <br> Law Research</h2>
            <p class="pb-3">Attorney Raju Mahajan & Associates</p>
        </div>
        <div class="col-md-4"><img class="thmb" src="assets/img/video/img_1.png"></div>
        <div class="col-md-4 bg-blue">
            <a class="pt-3 popup-youtube" href="//www.youtube.com/watch?v=WFkV3yD3k8A"><img
                        src="assets/img/video/play-button.png"></a>
            <h2>Importance of Appointing a <br> US Attorney for Writ of Mandamus</h2>
            <p class="pb-3">Attorney Raju Mahajan & Associates</p>
        </div>
        <div class="col-md-4"><img class="thmb" src="assets/img/video/img_2.png"></div>
        <div class="col-md-4 bg-red">
            <a class="pt-3 popup-youtube" href="//www.youtube.com/watch?v=WFkV3yD3k8A"><img
                        src="assets/img/video/play-button.png"></a>
            <h2>5 Wrong Concepts of NIW Based <br> Green Card</h2>
            <p class="pb-3">Attorney Raju Mahajan & Associates</p>
        </div>
        <div class="col-md-4"><img class="thmb" src="assets/img/video/img_3.png"></div>
    </section>


    <section class="video-section grey-bg pt-5 pb-5">
        <div class="container">
            <div class="w-100 text-center">
                <div class="sec-title">
                    <h2 class="blue mb-5 pb-5" style="font-weight:500;">Immigration News Update</h2>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">

                <div class="col-md-4 mb-5">
                    <div class="post-box white-shadow-box">
                        <h4>Weekly Immigration News Recap (December 19-25)</h4>
                        <p><small><i class="icofont-clock-time"></i> December 5, 2023</small></p>
                        <img src="assets/img/blog/blog_img-1.png">
                        <p>Weekly immigration news recap (December 19-25) Options for Nonimmigrant Workers Following
                            termination of...</p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="post-box white-shadow-box">
                        <h4>Weekly Immigration News Recap (December 19-25)</h4>
                        <p><small><i class="icofont-clock-time"></i> December 5, 2023</small></p>
                        <img src="assets/img/blog/blog_img-2.png">
                        <p>Weekly immigration news recap (December 19-25) Options for Nonimmigrant Workers Following
                            termination of...</p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="post-box white-shadow-box">
                        <h4>Weekly Immigration News Recap (December 19-25)</h4>
                        <p><small><i class="icofont-clock-time"></i> December 5, 2023</small></p>
                        <img src="assets/img/blog/blog_img-3.png">
                        <p>Weekly immigration news recap (December 19-25) Options for Nonimmigrant Workers Following
                            termination of...</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="container text-center my-5">
            <a class="btn btn-white-alt mb-5" href="blog.html">View All News <i class="fas fa-angle-right ml-1"></i></a>
        </div>
    </section>


    <section class="testimonial-section">
        <div class="contianer pb-5 mt-5">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title">
                    <h2 class="blue"><b>We Give Best Service to Our Clients</b></h2>
                    <p class="red" style="letter-spacing: 2px;">CLIENT TESTIMONIALS</p>
                </div>
            </div>
        </div>
        <div class="container testi-blocks pt-5 pb-5 grey-bg" style="border-radius: 20px;">

            <div class="customize-tools">
                <ul class="thumbnails" id="customize-thumbnails">
                    <li>
                        <img src="assets/img/testi/client_icon-1.png">
                    </li>
                    <li>
                        <img src="assets/img/testi/client_icon-1.png">
                    </li>
                    <li>
                        <img src="assets/img/testi/client_icon-2.png">
                    </li>
                    <li>
                        <img src="assets/img/testi/client_icon-1.png">
                    </li>
                    <li>
                        <img src="assets/img/testi/client_icon-1.png">
                    </li>
                </ul>
            </div>

            <div class="customize pt-5" id="customize">

                <div class="testimonial-item text-center">
                    <div style="max-width: 500px;margin: auto;">
                        <h4>Tasnim Zara</h4>
                        <div class="ratings">
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                        </div>
                        <p>Example, In promotion and advertising, a testimonial or show consists of a person's written or
                            spoken statement extolling the virtue of a product. The term "testimonial" most commonly
                            applies to the sales-pitches attributed to ordinary citizens</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <div style="max-width: 500px;margin: auto;">
                        <h4>Tasnim Zara</h4>
                        <div class="ratings">
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                        </div>
                        <p>Example, In promotion and advertising, a testimonial or show consists of a person's written or
                            spoken statement extolling the virtue of a product. The term "testimonial" most commonly
                            applies to the sales-pitches attributed to ordinary citizens</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <div style="max-width: 500px;margin: auto;">
                        <h4>Tasnim Zara</h4>
                        <div class="ratings">
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                        </div>
                        <p>Example, In promotion and advertising, a testimonial or show consists of a person's written or
                            spoken statement extolling the virtue of a product. The term "testimonial" most commonly
                            applies to the sales-pitches attributed to ordinary citizens</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <div style="max-width: 500px;margin: auto;">
                        <h4>Tasnim Zara</h4>
                        <div class="ratings">
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                        </div>
                        <p>Example, In promotion and advertising, a testimonial or show consists of a person's written or
                            spoken statement extolling the virtue of a product. The term "testimonial" most commonly
                            applies to the sales-pitches attributed to ordinary citizens</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <div style="max-width: 500px;margin: auto;">
                        <h4>Tasnim Zara</h4>
                        <div class="ratings">
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                        </div>
                        <p>Example, In promotion and advertising, a testimonial or show consists of a person's written or
                            spoken statement extolling the virtue of a product. The term "testimonial" most commonly
                            applies to the sales-pitches attributed to ordinary citizens</p>
                    </div>
                </div>

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


@endsection
@push('js')
    <script type="text/javascript">
        const div = document.querySelector("#rewind");
        const section = document.querySelector(".team-member-carousel");
        let currentX = 0;
        const targetX = -77;
        const step = 0.01;
        let isPlaying = true;
        section.addEventListener("mouseenter", function () {
            isPlaying = false;
        });
        section.addEventListener("mouseleave", function () {
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
    </script>
@endpush
