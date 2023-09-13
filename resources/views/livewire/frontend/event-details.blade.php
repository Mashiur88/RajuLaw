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

    .img{
        width: 40%;
        display:flex;
        float: left;
        align-items: center;
        padding: 2px;
        min-height: 150px;
    }

    .content{
        width: 60%;
        display: flex;
        padding: 3px;
       flex-direction: column;
       min-height: 150px;
    }

    .news{
        width: 90%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
    }

    .deg{
        padding: 3px;
        border-radius: 0px 11px 0px 11px;
    }
</style>
@endpush
<div class="">
    <div>
        <img src="{{ asset('assets/frontend/img/event-detail-bg.jpg') }}" height="550" width="1458">
        <div><h1>{{ $event_name }}</h1></div>
        <div>
            <ul>
                <li><i></i>Date: {{ $event_date }} </li>
                <li><i></i>Location: {{ $location }}</li>
                <li><i></i>Venue: {{ $venue }}</li>
                <li><i></i>Organizer: {{ $event_organizer }}</li>
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sec-title pt-5 pb-5 center">
                    <h4 class="text-design" style="letter-spacing: 2px;font-size: 40px;font-weight: 500;">{{ $event_name }}</h4>
                </div>
                <div class="images mb-5">
                    <img src="{{ asset('storage/' . $banner_image) }}" alt="event_banner">
                </div>
                <div class="details">
                    <p>{!! $event_description !!}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sec-title pt-5 pb-5 center">
                    <h4 class="text-design" style="letter-spacing: 2px;font-size: 40px;font-weight: 500;">Recent News</h4>
                </div>
                <div class="news ml-5">
                    @if(!empty($news))
                        @foreach($news as $data)
                            <div style="width: 100%">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $data->banner_image) }}" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="text-right">{{ $data->title }}</h3>
                                    <a href="{{ route('blog_single',['type' => 'immigration','slag' => $data->slag])}}" class="text-right"><button class="btn-primary deg">Read Mode</button></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>