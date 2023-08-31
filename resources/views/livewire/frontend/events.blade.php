<x-slot name="title">
    Events
</x-slot>
@push('css')
<style>
    .center{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card{
        border-radius: 15px;
    }

    .design{
        border-bottom: 2px solid red;
        border-radius: 15px;
    }

    .link{
        color: red;
    }

    .text-design{
        font-family: "Libre Baskerville";
        font-size: 20px;
        line-height: 1.6 em;
        color:#0b2d72 !important;
    }

    .date{
        background-color: rgb(171, 22, 22);
        color:white;
        padding: 5px;
        border-radius: 5px;
    }
</style>
@endpush
<div class="">
    <img src="{{ asset('assets/frontend/img/event-bg.jpg') }}" height="550" width="1458">

    <div class="sec-title pt-5 pb-5 center">
        <h4 class="red" style="letter-spacing: 2px;font-size: 40px;font-weight: 500;">Recent Events</h4>
    </div>
    
    <div class="container">
        @if(!empty($events))
        @php $i = 0; @endphp
            @foreach($events as $event)
            @if($i == 0 || $i == 3)
                    <div class="row mt-5">
                @endif
                <div class="col-md-4 center p-3">
                    <div class="card" style="width: 35rem; min-height: 350px;">
                        <img class="card-img-top design" src="{{ asset('storage/' . $event->banner_images) }}" alt="Card image cap" height="170">
                        <div class="card-body">
                        <h5 class="card-title"><span class="date">{{ date_convertion($event->event_date) }}</span></h5>
                        <p class="card-text"><h2 class="text-design">{{ $event->event_name }}</h2></p>
                        <a href="{{ route('event_details',['id' => $event->id])}}" class="link">Read more..</a>
                    </div>
                </div>
            </div>
            @if($i == 2 || $i == 5)
        </div>
        @endif
        @php $i++; @endphp
        @endforeach
        @endif
    </div>
</div>