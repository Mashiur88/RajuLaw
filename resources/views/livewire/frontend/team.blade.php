<x-slot name="title">
    Team Member
</x-slot>
 
<div>
    <!-- Slider Section -->
    <img src="{{ asset('assets/frontend/img/team-page-bg.jpg') }}">

    <section class="team-members-section pt-5 pb-5">
        <div class="container">
            <div class="w-100 d-flex justify-content-center">
                <div class="sec-title pt-5 pb-5">
                    <h4 class="red" style="letter-spacing: 2px;font-size: 40px;font-weight: 500;">MEET OUR TEAM</h4>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5 pb-5">
            <div class="row">
                @foreach ($team as $data)
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="team-box white-shadow-box">
                            <img src="{{ asset('storage/' . $data['image']) }}">
                            <h3>{{ $data['name'] }}</h3>
                            <h5>{{ $data['designation'] }}</h5>
                            {{-- <button class="btn mt-4" type="submit"
                                style="height: 36px;padding: 5px;font-size: 15px;width: 100%;border-radius: 8px;"
                                wire:click="team_details({{ $data['id'] }})">See Details <i
                                    class="fa fa-angle-right"></i>
                            </button> --}}
                            <a href="{{ route('profile_details',['id' => $data['id']]) }}">
                                <button class="btn mt-4" type="submit"
                                style="height: 36px;padding: 5px;font-size: 15px;width: 100%;border-radius: 8px;"
                                >See Details<i class="fa fa-angle-right"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    @include('frontend.pasges.home_missle_section')

    <div class="modal fade" id="teamdetails" tabindex="-1" role="dialog" aria-labelledby="teamdetailsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="tpc" class="zoom-anim-dialog" style="margin:0px">
                        <div class="tp-header">
                            <div class="tp-img">
                                <img src="{{ asset('storage/' . $image) }}">
                            </div>

                            <div class="tp-meta">
                                <h3>{{ $name }}</h3>
                                <h5>{{ $designation }}</h5>
                                <div class="social_icons">
                                    @if ($fb)
                                        <a href="{{ $fb }}"><i class="fab fa-facebook-f"></i></a>
                                    @endif

                                    @if ($twt)
                                        <a href="{{ $twt }}"><i class="fab fa-twitter"></i></a>
                                    @endif

                                    @if ($in)
                                        <a href="{{ $in }}"><i class="fab fa-linkedin"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tp-body">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                <a href="{{ route('appointment') }}" type="button" class="btn btn-secondary" style="border-radius:10px">{{ setting(32) }} <i class="fa fa-angle-right"></i></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:10px">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')
    <script>
        window.addEventListener('open_model', event => {
            $('#teamdetails').modal('show');
        });
    </script>
@endpush
