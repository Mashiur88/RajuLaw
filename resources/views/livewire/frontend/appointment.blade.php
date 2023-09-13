<x-slot name="title">
    Book Your Appointment
</x-slot>

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tagify.css') }}" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" />

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
                        Book Your Appointment
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <form>
            <div class="appointment-content">
                <div class="container">
                    <div class="tab-panel">
                        <div class="tab-ctrl">
                            <a href="{{ route('appointment') }}" wire:click:prevent='change_mode'
                                class="tab-link active">Free Consultation</a>
                            <a href="{{ route('appointment2') }}" wire:click:prevent='change_mode' class="tab-link">PAID Consultation</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="container">
                    <div id="free-consultation" class="tab active">
                        <div class="consultation-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 mb-5">
                                            <div class="payment-make-area">
                                                <h3>$0</h3>
                                                <p><i class="icofont-info-circle"></i> {{appointment_setting(1)}}</p>
                                                <p><i class="icofont-info-circle"></i> {{appointment_setting(2)}}</p>
                                                <p><i class="icofont-info-circle"></i> {{appointment_setting(3)}}</p>
                                                <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                    target="_blank" style="margin-top:10px">Click Here</a>
                                                <p style="text-align::center;font-size:18px">
                                                    {{appointment_setting(4)}}
                                                </p>
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt-5 mt-md-0">
                                            <div class="payment-make-area">
                                                <h2>Payment Options</h2>
                                                <br>
                                                <p>
                                                    QuickPay With Zelle Or Paypal
                                                </p>
                                                <br>
                                                <p>
                                                    Email: raju@rajulaw.com
                                                    <br>
                                                    Name: Mahajan Law LLC
                                                </p>
                                                <br>
                                                <P>
                                                    ***This fee will be deducted if you retain our service.

                                                    Credit or Debit Card or eCheck:</P>
                                                    <br>

                                                <a href="https://secure.lawpay.com/pages/rajulaw/operating"
                                                    traget="blank">Click Here</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="calendly-inline-widget"
                                        data-url="https://calendly.com/rajulaw/free"
                                        style="position: relative;min-width:100%;height:700px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>





</div>
@push('js')
    <script src="{{ asset('assets/frontend/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/js/vendor/virtual-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jQuery.tagify.min.js') }}"></script>

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
            var enableDatesArray = [];
            var sortDatesArry = [];
            for (var i = 0; i < enableDates.length; i++) {
                var dt = enableDates[i].date.replace("-", "/").replace("-", "/");
                var dd, mm, yyy;
                if (
                    parseInt(dt.split("/")[0]) <= 9 ||
                    parseInt(dt.split("/")[1]) <= 9
                ) {
                    dd = parseInt(dt.split("/")[0]);
                    mm = parseInt(dt.split("/")[1]);
                    yyy = dt.split("/")[2];
                    enableDatesArray.push(dd + "/" + mm + "/" + yyy);
                    sortDatesArry.push(
                        new Date(yyy + "/" + dt.split("/")[1] + "/" + dt.split("/")[0])
                    );
                } else {
                    enableDatesArray.push(dt);
                    sortDatesArry.push(
                        new Date(
                            dt.split("/")[2] +
                            "/" +
                            dt.split("/")[1] +
                            "/" +
                            dt.split("/")[0] +
                            "/"
                        )
                    );
                }
            }
            var maxDt = new Date(Math.max.apply(null, sortDatesArry));
            var minDt = new Date(Math.min.apply(null, sortDatesArry));

            $("#datepicker")
                .datepicker({
                    format: "dd-mm-yyyy",
                    autoclose: true,
                    startDate: minDt,
                    endDate: maxDt,
                    beforeShowDay: function(date) {
                        var dt_ddmmyyyy =
                            date.getDate() +
                            "/" +
                            (date.getMonth() + 1) +
                            "/" +
                            date.getFullYear();
                        return enableDatesArray.indexOf(dt_ddmmyyyy) != -1;
                    },
                })
                .on("changeDate", function(e) {
                    var selectedDate = e.format("dd-mm-yyyy");
                    let currentDate = enableDates.find((d) => d.date === selectedDate);

                    const [day, month, year] = selectedDate.split("-");
                    const date = new Date(`${year}-${month}-${day}`);
                    const fD = date.toLocaleDateString("en-US", {
                        weekday: "long",
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    });
                    let scheduleTime = currentDate.time + ", " + fD;

                    document.querySelector("#time-select").value = currentDate.time;
                    document.querySelector(".selected-time-show").style.display =
                        "block";
                    document.querySelector(".schedule-time").textContent = scheduleTime;
                    document.getElementById("schedule-time-inp").value = scheduleTime;
                });

            $("[name=inputTags]").tagify({
                duplicates: false,
                maxTags: 10,
                pattern: "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$",
                validate: function(e) {
                    const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return pattern.test(e.value);
                },
            });
        });
    </script>

    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: 1,
            grabCursor: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
                640: {
                    slidesPerView: 2,
                },
            },
        });
    </script>
@endpush
