<x-slot name="title">
    Book Your Appointment
</x-slot>

@push('css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tagify.css') }}" /> --}}

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" /> --}}

    <style>
        #calendly-block-1 {
            margin-top: 0;
            height: 900px;
        }

        .appointment-page .tab-content {
            padding-top: 15px;
        }

        /* .appointment-page .tab-content.padding{
            padding-top: 35px;
        } */

        .center{
            display:flex;
            justify-content: center;
            align-items: center;
        }

        @media only screen and (min-width: 780px) {
            #calendly-block-1 {
                height: 1150px;
            }
        }

        ._cUP1np9gMvFQrcPftuf._Y8HCTxgNkwxXcG_DCXx {
            padding: 0px !important;
        }
    </style>
@endpush
<div class="appointment-page">
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <h2>
                        Book Your
                        Appointment
                    </h2>
                </div>
            </div>
        </div>
    </section>
    @php $i = 0; @endphp
    <section>
        <form>
            <div class="container">
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    @foreach($datas as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link @if($key === 0) active @endif" 
                            id="tab{{ $key }}" 
                            data-toggle="tab" 
                            href="#tabContent{{ $key }}" 
                            role="tab" 
                            aria-controls="tabContent{{ $key }}" 
                            aria-selected="@if($key === 0) true @else false @endif">
                            {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content padding" id="myTabsContent">
                    @foreach($datas as $key => $item)
                        <div class="tab-pane fade @if($key === 0) show active @endif" 
                            id="tabContent{{ $key }}" role="tabpanel" aria-labelledby="tab{{ $key }}">
                            <div class="text-center">{!! $item['attorny_note'] !!}</div>
                            <ul class="nav nav-tabs center" id="childTabs{{ $key }}">
                                @foreach($item['group'] as $childIndex => $childTab)
                                    {{-- <li class="nav-item">
                                        <a class="nav-link {{ $childIndex == 0 ? 'active' : '' }}" data-toggle="tab" href="#childTab{{ $index }}-{{ $childIndex }}">{{ $childTab }}</a>
                                    </li> --}}

                                    <li class="nav-item">
                                        <a class="nav-link @if($childIndex === 'Free') active @endif" 
                                        id="tab{{ $childIndex }}" 
                                        data-toggle="tab" 
                                        href="#tabContent{{ $key }}{{ $childIndex }}" 
                                        role="tab" 
                                        aria-controls="tabContent{{ $key }}{{ $childIndex }}" 
                                        aria-selected="@if($key === 0) true @else false @endif">
                                        {{ $childTab['group_name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach($item['group'] as $childIndex => $data)
                                    <div id="tabContent{{ $key }}{{ $childIndex }}" class="tab-pane fade {{ $childIndex == 'Free' ? 'show active' : '' }}">
                                        <!-- Content for child tab goes here -->
                                        <div class="container">
                                            <div class="consultation-form">
                                                <div class="row">
                                                    <div id="free-consultation" class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-5">
                                                                <div class="payment-make-area">
                                                                    <h2>{{ $data['duration1'] }} minutes</h2>
                                                                    <p>
                                                                        <i class="icofont-info-circle"></i> {{appointment_setting(5)}}
                                                                    </p>
                                                                    <h3>$ {{ $data['charge1'] }}</h3>
                                                                    <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                        target="_blank">Click Here</a>
                                                                    <br>
                                                                    <p style="text-align::center;font-size:17px">
                                                                        {!! $data['note'] !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-5 mb-5 mt-md-0">
                                                                <div class="payment-make-area">
                                                                    <h2>{{ $data['duration2'] }} minutes</h2>
                                                                    <p>
                                                                        <i class="icofont-info-circle"></i> {{appointment_setting(7)}}
                                                                    </p>
                                                                    <h3>$ {{ $data['charge2'] }}</h3>
                                                                    <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                        target="_blank">Click here</a>
                                                                    <br>
                                                                    <p style="text-align::center;font-size:17px">
                                                                        {!! $data['note'] !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                    
                                                            <div class="col-md-12 mt-5 mt-md-0">
                                                                <div class="payment-make-area">
                                                                    <h2>Payment Options</h2><br>
                                                                    <p style="font-size:20px">QuickPay With Zelle Or Paypal</p>
                                                                    <p>
                                                                        Email: raju@rajulaw.com
                                                                        <br>
                                                                        Name: Mahajan Law LLC
                                                                    </p>
                                                                    
                                                                    <br>
                                                                    <p style="text-align::center;font-size:17px">
                                                                        ***This fee will be deducted from the service fee if you retain our services within two months after the consultation.
                                                                        Credit or Debit Card or eCheck:
                                                                    </p>
                                                                    <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                        target="_blank">Click here</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if($data->attorny_id === 10)
                                                        <div class="calendly-inline-widget"
                                                            data-url="https://calendly.com/rajulaw/paid-legal-consultation"
                                                            style="position: relative;min-width:100%;height:900px;">
                                                        </div>
                                                        @elseif($data->attorny_id === 15)
                                                        <div class="calendly-inline-widget" 
                                                            data-url="https://calendly.com/helenatrajulaw/free-legal-consultation" 
                                                            style="position: relative;min-width:100%;height:900px;">
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div data-container="side-panel" class="WrdpezlzjKu1CoRihaXS Rb2e9IwsOFiKlSQIX7YA h8SdAyUIogxbb6E2K6rg">
                    <div class="vijtvgyx_9152uGHndeu ij0tkCti5WftuGeyXE84">
                        <div data-simplebar="init" class="g4kIX1cEbAUBf5qD2Udt EDtlc0_uFpxiVRZXmgE5">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer">
                                    </div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <div class="Z3zhp7CS7tNsCSX6_KJW KtQUtHvVvyq716gdA29c">
                                                    <div class="dByP7suNIfCqOSaMcM6_ _CXzNZJcVKGB6oSxcDYf NADtHiCrFJt6_HOiERKZ">
                                                        <div class="hPAsHHd0FN8065UiP705 bPjMK2MqWr9_ZWcyR8AJ">
                                                            <img src="https://d3v0px0pttie1i.cloudfront.net/uploads/user/logo/6982676/c88692e2.png" alt="Company logo" class="tSHP4_7gU1EgmhU4cdix _CTgggv6aoPOIqf8ezib">
                                                        </div>
                                                        <img src="https://d3v0px0pttie1i.cloudfront.net/uploads/user/avatar/6982676/ea0940d7.jpg" alt="Raju Mahajan" class="l8_ox8UFJxB3KJMwAXbz _sRvWjppwBLlS1XAiWzQ MxVHio_kCduDhFI7_BcA SQ_Bs3qHy7XHjSu3iTrm">
                                                        <div data-component="name" class="igLUv25CGn1lcV9W4BLo VHgo1Gke8HlB303mVQsG q4cOvvEx6Vd1DIiuVXso A0C3rymvRQogoPtPXiac">
                                                            Raju Mahajan
                                                        </div>
                                                        <h1 class="aJYfwRAjpy85vGyjTA_k aNTWZDYqtNuY8Y3A0Rlw nCQmpQ3zRtu1xXb_x8YC R1isNh0uc_tOLdsYmkAw">
                                                            Paid Legal Consultation
                                                        </h1>
                                                    </div>
                                                    <div class="dukviH9w_EuHzTw_qBQt NgoiMCeEYfWcZjlNlAgG _o4yKEXO8fZvesyAJG0I _IRk0gtVIyTSjFkNgcus">
                                                        <div data-container="details" class="_L4TEojXfdzWp8RxMPuB N0L2N94hAAnivlQ6DGit Ko5wAaZye5TiJ64tY67l">
                                                            <div class="YAmKI90l5OyINFgGmq9L TuKawS25ZXxJafgZdElP">
                                                                <div class="kjPV9BSUqWArFIVxfBTq _7Au4UjgXrnFtkfgdDsM">
                                                                    <span class="b1hdxvdx b1wd19y1 s16dkyhx" aria-hidden="true">
                                                                        <svg data-id="details-item-icon" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg" role="img">
                                                                            <path d="M.5 5a4.5 4.5 0 1 0 9 0 4.5 4.5 0 1 0-9 0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                                                </path>
                                                                                <path d="M5 3.269V5l1.759 2.052" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">

                                                                                </path>
                                                                        </svg>
                                                                    </span>
                                                                </div> 
                                                                30&nbsp;min
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="yHJsX7btzZUMOuQu_qbF _QY08ZnTdckO8dGtuWjX rITYjoHV2NF_yl1tR68x JfQGCpel4t_oM2foWCI3 wlKFfVZJpBVMO1_YKK_f">
                                                            <div class="k_tUa2XwT0esKZkWYshM UOUgYFhrylMAqJDUG1Tn">
                                                                <p>This is a Paid Legal Consultation.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 330px;">
                                </div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
                                </div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </form>
    </section>
</div>
@push('js')
    {{-- <script src="{{ asset('assets/frontend/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/js/vendor/virtual-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jQuery.tagify.min.js') }}"></script>  --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script> 
    <script>
        Calendly.initInlineWidget({
            url: 'https://calendly.com/FHMMIIBNGRYDUCXH6KKPY2OENGG6OQJC',
            parentElement: document.getElementById('SAMPLEdivID'),
            prefill: {},
            utm: {}
        });
    </script>

    <script>
        var enableDates = [{
                time: "1:00pm",
                date: "28-03-2023",
            },
            {
                time: "4:00pm",
                date: "22-03-2023",
            },
            {
                time: "3:00pm",
                date: "18-03-2023",
            },
            {
                time: "9:00pm",
                date: "10-03-2023",
            },
            {
                time: "10:00pm",
                date: "20-03-2023",
            },
        ];

        $(document).ready(function() {
        //     var enableDatesArray = [];
        //     var sortDatesArry = [];
        //     for (var i = 0; i < enableDates.length; i++) {
        //         var dt = enableDates[i].date.replace("-", "/").replace("-", "/");
        //         var dd, mm, yyy;
        //         if (
        //             parseInt(dt.split("/")[0]) <= 9 ||
        //             parseInt(dt.split("/")[1]) <= 9
        //         ) {
        //             dd = parseInt(dt.split("/")[0]);
        //             mm = parseInt(dt.split("/")[1]);
        //             yyy = dt.split("/")[2];
        //             enableDatesArray.push(dd + "/" + mm + "/" + yyy);
        //             sortDatesArry.push(
        //                 new Date(yyy + "/" + dt.split("/")[1] + "/" + dt.split("/")[0])
        //             );
        //         } else {
        //             enableDatesArray.push(dt);
        //             sortDatesArry.push(
        //                 new Date(
        //                     dt.split("/")[2] +
        //                     "/" +
        //                     dt.split("/")[1] +
        //                     "/" +
        //                     dt.split("/")[0] +
        //                     "/"
        //                 )
        //             );
        //         }
        //     }
        //     var maxDt = new Date(Math.max.apply(null, sortDatesArry));
        //     var minDt = new Date(Math.min.apply(null, sortDatesArry));

        //     $("#datepicker")
        //         .datepicker({
        //             format: "dd-mm-yyyy",
        //             autoclose: true,
        //             startDate: minDt,
        //             endDate: maxDt,
        //             beforeShowDay: function(date) {
        //                 var dt_ddmmyyyy =
        //                     date.getDate() +
        //                     "/" +
        //                     (date.getMonth() + 1) +
        //                     "/" +
        //                     date.getFullYear();
        //                 return enableDatesArray.indexOf(dt_ddmmyyyy) != -1;
        //             },
        //         })
        //         .on("changeDate", function(e) {
        //             var selectedDate = e.format("dd-mm-yyyy");
        //             let currentDate = enableDates.find((d) => d.date === selectedDate);

        //             const [day, month, year] = selectedDate.split("-");
        //             const date = new Date(`${year}-${month}-${day}`);
        //             const fD = date.toLocaleDateString("en-US", {
        //                 weekday: "long",
        //                 year: "numeric",
        //                 month: "long",
        //                 day: "numeric",
        //             });
        //             let scheduleTime = currentDate.time + ", " + fD;

        //             document.querySelector("#time-select").value = currentDate.time;
        //             document.querySelector(".selected-time-show").style.display =
        //                 "block";
        //             document.querySelector(".schedule-time").textContent = scheduleTime;
        //             document.getElementById("schedule-time-inp").value = scheduleTime;
        //         });

        //     $("[name=inputTags]").tagify({
        //         duplicates: false,
        //         maxTags: 10,
        //         pattern: "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$",
        //         validate: function(e) {
        //             const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        //             return pattern.test(e.value);
        //         },
        //     });
        });
    </script>

    <script>
        // var swiper = new Swiper(".swiper-container", {
        //     slidesPerView: 1,
        //     grabCursor: true,
        //     spaceBetween: 10,
        //     navigation: {
        //         nextEl: ".swiper-button-next",
        //         prevEl: ".swiper-button-prev",
        //     },
        //     breakpoints: {
        //         768: {
        //             slidesPerView: 3,
        //         },
        //         640: {
        //             slidesPerView: 2,
        //         },
        //     },
        // });   
    </script>
@endpush
