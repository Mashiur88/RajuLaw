<x-slot name="title">
    {{ $page_title }}
</x-slot>


<div class="inner-page legal-fees-page">
    <section class="page-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Legal Fees</h2>
                    <h3>Select a service to view a fees*</h3>
                </div>
                <div class="col-md-6 left-bottom mt-5 mt-md-0">
                    {{-- <img src="{{ asset('assets/frontend/img/widget/legal-fees-hero-img.png') }}" /> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="legal-fees-content my-5">
        <div class="container">

            @foreach ($legal_fees as $data)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h2>{{ $data->name }}</h2>
                            <span class="accordion-icon"></span>
                        </div>
                        <div class="accordion-content">
                            <div class="table">
                                @if ($data['first_part'])
                                    <div class="cell">
                                        <h2 class="header">First Part</h2>
                                        <h4>{{ $data['first_part'] }}</h4>
                                        <div>
                                        @foreach ($data->child_data->where('section_name','section_one') as $data2)
                                            <div class="item">
                                                <p>{{ $data2['lebel'] }}</p>
                                                <p>{{ $data2['tag'] }}</p>
                                            </div>
                                        @endforeach                                       
                                        </div>
                                    </div>
                                @endif

                                @if ($data['second_part'])
                                    <div class="cell">
                                        <h2 class="header">Second Part</h2>
                                        <h4>{{ $data['second_part'] }}</h4>
                                        <div>
                                        @foreach ($data->child_data->where('section_name','section_two') as $data3)
                                            <div class="item">
                                                <p>{{ $data3['lebel'] }}</p>
                                                <p>{{ $data3['tag'] }}</p>
                                            </div>
                                        @endforeach                                       
                                        </div>
                                    </div>
                                @endif
                                
                                
                                @if ($data['notes'])
                                    <div class="cell">
                                        <h2 class="header">Notes *</h2>
                                        <h4>{{ $data['notes'] }}</h4>
                                        <div>
                                        @foreach ($data->child_data->where('section_name','section_three') as $data4)
                                            <div class="item">
                                                <p>{{ $data4['lebel'] }}</p>
                                                <p>{{ $data4['tag'] }}</p>
                                            </div>
                                        @endforeach                                       
                                        </div>
                                    </div>
                                @endif

            
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



            <div class="payment-btn-area">
                <div class="text-center">
                    <a href="https://secure.lawpay.com/pages/rajulaw/operating" target="_blank">
                        <i class="icofont-pay" style="font-size: 22px"></i>
                        Make Your Payment Here
                    </a>
                </div>
                <p>
                    An additional 3% processing fee will be charged because they
                    charge us if you pay via LawPay or PayPal.
                </p>
            </div>
        </div>
    </section>
</div>


@push('js')
    <script>
        // according list ==============
        var accordionItem = document.getElementsByClassName("accordion-header");

        for (var i = 0; i < accordionItem.length; i++) {
            accordionItem[i].addEventListener("click", function() {
                var accordionContent = this.nextElementSibling;
                for (var j = 0; j < accordionItem.length; j++) {
                    var otherAccordionContent = accordionItem[j].nextElementSibling;
                    if (otherAccordionContent !== accordionContent) {
                        accordionItem[j].parentElement.classList.remove("active");
                    }
                }
                this.parentElement.classList.toggle("active");
            });
        }
    </script>
@endpush
