<x-slot name="title">
    FAQ
</x-slot>


@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tagify.css') }}" />
@endpush


<div class="faq-page">
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h3>
                        Frequently Asked Questions (FAQ) <br />
                        on Different Immigration
                    </h3>
                </div>
            </div>
        </div>
    </section>


    <section class="faq-main-tab">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="tabs main-tab">
                        @foreach ($faqs as $key => $data)
                            <li class="tab-link tab-header {{ $selected_faq->id == $data->id ? 'active' : '' }}"
                                data-tab="tab{{ $selected_faq->id }}" wire:click="click_data({{ $data->id }})">
                                <span>{{ $data->name }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="p-4">
                        @if ($have_child)
                            <div class="tab-content active">
                                <div class="nested-tab">
                                    <div class="nested-tab-menu">
                                        <ul>
                                            @foreach ($child_item as $key2 => $data2)
                                                <li class="nested-tab-link{{ $active_child_item->id == $data2->id ? 'active' : '' }}"
                                                    wire:click="child_item_content({{ $data2->id }})">
                                                    <span>{{ $data2->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="container pt-5">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                @foreach ($contents as $key3 => $data3)
                                                    <div class="card-header" data-toggle="collapse"
                                                        href="#collapse{{ $key3 + 1 }}">
                                                        <a class="card-title">
                                                            {{ $key3 + 1 }}. {{ $data3['title'] }}
                                                        </a>
                                                    </div>
                                                    <div id="collapse{{ $key3 + 1 }}"
                                                        class="card-body collapse {{ $key3 == 0 ? 'show' : '' }}"
                                                        data-parent="#accordion">
                                                        <p>
                                                            {{ $data3['plain_desc'] }}
                                                        </p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="tab-content p-2 active">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                    aria-labelledby="nav-one-tab">
                                    <div class="container pt-5">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                @foreach ($contents as $key3 => $data3)
                                                    <div class="card-header" data-toggle="collapse"
                                                        href="#collapse{{ $key3 + 1 }}" aria-expanded="false">
                                                        <a class="card-title">
                                                            {{ $key3 + 1 }}. {{ $data3['title'] }}
                                                        </a>
                                                    </div>
                                                    <div id="collapse{{ $key3 + 1 }}"
                                                        class="card-body collapse {{ $key3 == 0 ? 'show' : '' }}"
                                                        data-parent="#accordion">
                                                        <p>
                                                            {{ $data3['plain_desc'] }}
                                                        </p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@push('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/js/vendor/virtual-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jQuery.tagify.min.js') }}"></script>

    <script></script>

    <script>
        $(document).ready(function() {
            $(".accordion-content").hide();
            $(".accordion-header").click(function() {
                var accordionContainer = $(this).closest(".accordion-container");
                var accordionContent = $(this).next(".accordion-content");

                if ($(this).hasClass("active")) {
                    accordionContent.slideUp();
                    $(this).removeClass("active");
                } else {
                    accordionContainer.find(".accordion-content").slideUp();
                    accordionContainer.find(".accordion-header").removeClass("active");
                    accordionContent.slideDown();
                    $(this).addClass("active");
                }
            });
        });
    </script>
@endpush
