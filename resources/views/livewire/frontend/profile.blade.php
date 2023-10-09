<x-slot name="title">
    Team Profile
</x-slot>

@push('css')
<style>
.mid-center{
    position: absolute;
    top: 45%;
    left: 57%;
}

#img-name{
    font-weight: 800;
    font-size: 45px;
    color: white;
}

#img-designation{
    font-weight: 800;
    font-size: 20px;
    color: white;
}

.img-div{
    background-color:#737C8D;
    height: 700px;
    position: relative;
}

.padding{
    padding-left: 200px;
    padding-top: 140px;
}

#image-position{
    height: 700px;
    width: 45%;
    position: relative;
    left: 10%;
}

h1{
    color: #be0b32;
    font-size: 30px;
}

h3{
    color: #0B2D72;
    font-size: 25px;
}

.info1{
    position: relative;
    bottom: 150px;
}

.profile{
    text-align: left;
}

a{
    color: none;
}
/* footer.footer{
    position: static;
} */

</style>
@endpush

<div class="container-fluid">
    <section  style="z-index: 2;">
        <div class="img-div">
            <img class="img-fluid" src="{{ asset('storage/' . $image) }}" id="image-position">
            <div class="mid-center">
                <p id="img-designation">{{ $designation }}</p>
                <p id="img-name">{{ $name }}</p>
            </div>
        </div>
    </section>
    <section style="z-index: 1;" class="info1">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="padding">
                        <p>{!! $about !!}</p>
                    </div>
                </div>
                <div class="col-md-4"  style="background-color: white; z-index: 3;padding: 28px;">
                    <h1>Branch</h1>
                    <p>{{ $branch }}</p>
                    <h1>Get in touch</h1>
                    <h3>Languages</h3>
                    <p>{{ $languages}}</p>
                    <h3>Contact Information</h3>
                    <p>Email: {{ $email }}</p>
                    <p>Phone: {{ $phone_number }}</p>
                    <h3>Connect Via</h3>
                    <div class="social_icons profile">
                        <span><a href="{{ $fb }}"><i class="fab fa-facebook-f"></i></a></span>
                        <span><a href="{{ $twt }}"><i class="fab fa-twitter"></i></a></span>
                        <span><a href="{{ $in }}"><i class="fab fa-linkedin"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
