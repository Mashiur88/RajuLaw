<header>
    @php
        $service_item = \App\Models\ServiceModel::all();
        $service_last_item = \App\Models\ServiceModel::find(6);
    @endphp
    <!-- Navigation Section -->
    <div class="navbar navbar-expand-md main-nav-section navbar-sticky">

        <div class="container white-shadow-box">

            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/frontend/img/logo/logo.png') }}"
                    alt=""></a>

            <div class="menu-toggle">
                <i class="fa fa-bars"></i>
            </div>

            <div class="navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mr-auto" lang="bn">
                    <li class="has-submenu">
                        <a href="#">Services <i class="fa fa-angle-down"></i></a>
                        <!-- <div class="mega-menu"> -->
                        <div class="mega-menu second-style">
                            <div class="container">

                                <div class="person_section">
                                    @foreach ($service_item as $key => $data)
                                        <div class="item">
                                            <h3>{{ $data->name }}</h3>
                                            <ul class="mega-sub-menu">
                                                @foreach ($data->chirld_services as $data2)
                                                    <li><a
                                                            href="{{ route('service', ['parent_slag'=>$data->slug,'slag'=>$data2->slag]) }}">{{ $data2->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('appointment') }}">Appointment</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Who We Are <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('about_us') }}">About Us</a></li>
                            <li><a href="{{ route('team') }}">Our Team</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('appointment') }}">Events</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#">More <i class="fa fa-angle-down"></i></a>

                        <!-- <div class="mega-menu"> -->
                        <div class="mega-menu second-style">
                            <div class="container">
                                <div class="person_section">

                                    <div class="item p-0">
                                        <a class="mega-link" href="{{ route('faq') }}">
                                            <img src="{{ asset('assets/frontend/img/mega-menu/FAQ_icon.png') }}">
                                            <span>FAQ</span>
                                        </a>
                                    </div>

                                    <div class="item p-0">
                                        <a class="mega-link"
                                            href="{{ route('blog_list', ['type' => 'immigration']) }}">
                                            <img src="{{ asset('assets/frontend/img/mega-menu/news_icon.png') }}">
                                            <span>Immigration News</span>
                                        </a>
                                    </div>

                                    <div class="item p-0">
                                        <a class="mega-link" href="{{ route('blog_list', ['type' => 'guideline']) }}">
                                            <img src="{{ asset('assets/frontend/img/mega-menu/Guideline_icon.png') }}">
                                            <span>Immigration Guidelines</span>
                                        </a>
                                    </div>

                                    <div class="item p-0">
                                        <a class="mega-link" href="{{ route('legal_fees') }}">
                                            <img src="{{ asset('assets/frontend/img/mega-menu/Fees_icon.png') }}">
                                            <span>Legal Fees</span>
                                        </a>
                                    </div>

                                    <div class="item p-0">
                                        <a class="mega-link" href="{{ route('contact_us') }}">
                                            <img src="{{ asset('assets/frontend/img/mega-menu/Contact_icon.png') }}">
                                            <span>Contact Us</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="ml-auto mr-4 d-sm-block d-none">
                    <button class="trigger-search">
                        <i class="icofont-search-1"></i>
                    </button>
                </div>

                <div class="header-info">
                    <div><i class="icofont-headphone-alt-2"></i> {{ setting(1) }}</div>
                    <div><i class="icofont-clock-time"></i> 24Hr Open</div>
                </div>

            </div>

        </div>
    </div>


    <!-- Mobile Navigation -->

    <div class="mobile-menu" id="mobile-menu">
        <div class="header-info">
            <div><i class="icofont-headphone-alt-2"></i> {{ setting(1) }}</div>
            <div><i class="icofont-clock-time"></i> 24Hr Open</div>
        </div>
        <ul>
            <li class="menu-item-has-children active">
                <a href="index.html">Services</a>
                <ul class="m-sub-menu">
                    @foreach ($service_item as $key => $data)
                            <li><a
                                    href="{{ route('service', ['parent_slag'=>$data->slug,'slag'=>$data2->slag]) }}">{{ $data->name }}</a>
                            </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="single.html">Appointment</a></li>
            <li><a href="notice.html">Who We Are</a></li>
            <li class="menu-item-has-children">
                <a href="">More</a>
                <ul class="m-sub-menu">
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('blog_list', ['type' => 'immigration']) }}">Immigration News</a></li>
                    <li><a href="{{ route('blog_list', ['type' => 'guideline']) }}">Immigration Guidelines</a></li>
                    <li><a href="">Legal Fees</a></li>
                    <li><a href="{{ route('team') }}"></a>team</li>
                </ul>
            </li>
            <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
        </ul>
    </div>
</header>

<!-- Search Modal -->
<div class="modal-search">
    <button class="close-button-search">&times;</button>
    <div class="modal-search-content">
        <form method="get" action="{{ route('request_data') }}">
            <input type="search" name="search" placeholder="Search..." />
        </form>
    </div>
</div>
