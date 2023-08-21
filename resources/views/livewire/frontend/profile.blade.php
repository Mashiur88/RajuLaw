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
    position: absolute;
    left: 10%;
}
h1{
    color: red;
    font-size: 30px;
}

h3{
    color: #0B2D72;
    font-size: 25px;
}

.info{
    /* position:absolute;
    top: 550px; */
}

/* footer.footer{
    position: static;
} */

</style>
@endpush

<div class="container-fluid" style="position: relative;">
    <section  style="z-index: 2;">
        <div class="img-div">
            <img src="{{ asset('storage/' . $image) }}" id="image-position">
            <div class="mid-center">
                <p id="img-designation">{{ $designation }}</p>
                <p id="img-name">{{ $name }}</p>
            </div>
        </div>
    </section>
    <section style="z-index: 1;" class="info">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="padding">
                        <p>{!! $about !!}</p>
                    </div>
                </div>
                <div class="col-md-4"  style="background-color: white; z-index: 3;">
                    <h1>Branch</h1>
                    <p></p>
                    <h1>Get in touch</h1>
                    <h3>Languages</h3>
                    <p></p>
                    <h3>Contact Information</h3>
                    <p></p>
                    <h3>Connect Via</h3>
                    <div><span><a href=""><i></i></a></span></div>
                </div>
            </div>
        </div>
    </section>
</div>
