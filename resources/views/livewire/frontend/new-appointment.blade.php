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

                <div class="tab-content" id="myTabsContent">
                    @foreach($datas as $key => $item)
                        <div class="tab-pane fade @if($key === 0) show active @endif" 
                            id="tabContent{{ $key }}" role="tabpanel" aria-labelledby="tab{{ $key }}">
                            <div class="appointment-content">
                                <div class="container">
                                    <div class="tab-panel">
                                        <div class="tab-ctrl"  style="margin-top: 0px;"`>
                                            <a href="#Free" class="tab-link active">Free Consultation</a>  {{-- {{ route('appointment') }}{{ route('appointment2') }} --}}
                                            <a href="#Paid" class="tab-link">PAID Consultation</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            @foreach($item['group'] as $data)
                            <div class="tab-content">
                                <div class="container">
                                    <div id="Free" class="tab active">
                                        <div class="consultation-form">
                                            <div class="row">
                                                <div id="free-consultation" class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-5">
                                                            <div class="payment-make-area">
                                                                <h2>{{appointment_setting(9)}}</h2>
                                                                <p>
                                                                    <i class="icofont-info-circle"></i> {{appointment_setting(5)}}
                                                                </p>
                                                                <h3>$ {{appointment_setting(10)}}</h3>
                                                                <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                    target="_blank">Click Here</a>
                                                                <br>
                                                                <p style="text-align::center;font-size:17px">
                                                                    {{appointment_setting(6)}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-5 mb-5 mt-md-0">
                                                            <div class="payment-make-area">
                                                                <h2>{{appointment_setting(11)}}</h2>
                                                                <p>
                                                                    <i class="icofont-info-circle"></i> {{appointment_setting(7)}}
                                                                </p>
                                                                <h3>$ {{appointment_setting(12)}}</h3>
                                                                <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                    target="_blank">Click here</a>
                                                                <br>
                                                                <p style="text-align::center;font-size:17px">
                                                                   {{appointment_setting(8)}}
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
                                                    <div class="calendly-inline-widget"
                                                        data-url="https://calendly.com/rajulaw/paid-legal-consultation"
                                                        style="position: relative;min-width:100%;height:700px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Paid" class="tab hidden">
                                        <div class="consultation-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-5">
                                                            <div class="payment-make-area">
                                                                <h2>{{appointment_setting(9)}}</h2>
                                                                <p>
                                                                    <i class="icofont-info-circle"></i> {{appointment_setting(5)}}
                                                                </p>
                                                                <h3>$ {{appointment_setting(10)}}</h3>
                                                                <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                    target="_blank">Click Here</a>
                                                                <br>
                                                                <p style="text-align::center;font-size:17px">
                                                                    {{appointment_setting(6)}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-5 mb-5 mt-md-0">
                                                            <div class="payment-make-area">
                                                                <h2>{{appointment_setting(11)}}</h2>
                                                                <p>
                                                                    <i class="icofont-info-circle"></i> {{appointment_setting(7)}}
                                                                </p>
                                                                <h3>$ {{appointment_setting(12)}}</h3>
                                                                <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                                    target="_blank">Click here</a>
                                                                <br>
                                                                <p style="text-align::center;font-size:17px">
                                                                   {{appointment_setting(8)}}
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
                                                    <div class="calendly-inline-widget"
                                                        data-url="https://calendly.com/rajulaw/paid-legal-consultation"
                                                        style="position: relative;min-width:100%;height:700px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                {{-- <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Tab 1</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Tab 2</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Tab 3</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabsContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        Content for Tab 1 goes here.
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        Content for Tab 2 goes here.
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        Content for Tab 3 goes here.
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
