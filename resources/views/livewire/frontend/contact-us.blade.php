<x-slot name="title">
    Contact Us
</x-slot>

<div>
    <!-- Slider Section -->
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="red">Get in touch with us!</h2>
                </div>
                <div class="col-md-6 left-bottom">
                    <img class="w-auto" src="{{ asset('assets/frontend/img/mobile-scroll-hand-vector.png') }}">
                </div>
            </div>
        </div>
    </section>



    <section class="contact-form-section">
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class=" text-center">
                        <form wire:submit.prevent='send_message'>
                            <h2>Send your Message by mail.</h2>

                            <x-alert />
                            <div class="f-group">
                                <input type="text" id="name" required class="full" placeholder=" " wire:model="name">
                                <label for="name">Full Name*</label>
                            </div>

                            <div class="f-group">
                                <input type="text" id="phon" placeholder=" " wire:model="phone">
                                <label for="phon">Phone Number*</label>
                            </div>

                            <div class="f-group">
                                <input type="email" id="email" placeholder=" " wire:model="email" wire:model="email">
                                <label for="email">Email*</label>
                            </div>

                            <div class="f-group">
                                <textarea id="mesge" placeholder=" " wire:model="message"></textarea>
                                <label for="mesge">Write Your Message</label>
                            </div>

                            <button class="btn mt-4" type="submit">Send Your Message <i
                                    class="fa fa-angle-right"></i></button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>



    <section class="contact-hero-section pt-5 mt-5">
        <div class="container">
            @foreach ($contact as $data)
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="ct-hero-box white-shadow-box">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/frontend/img/marker.png') }}">
                                <div class="ct-info">
                                    <h4>{{ $data['name'] }}</h4>
                                    <p>{{ $data['address'] }}</p>
                                    <a href="tel:{{ $data['phone'] }}">{{ $data['phone'] }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 my-5 gmap">
                        {!! $data['map'] !!}
                    </div>

                </div>
            @endforeach

        </div>
    </section>



    <div style="height:100px"></div>



    <!-- call to action section start -->
@include('frontend.pasges.home_missle_section')
</div>
