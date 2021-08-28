@extends('layouts.master_home')

@section('home_content')

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Services</strong></h2>
            <p>Build perfect websites, Beautifully handcrafted templates for your website</p>
        </div>



        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue" >
                    <div class="icon">
                        <img src="{{asset($service->image)}}" class="img-fluid" alt="">
                    </div>
                    <h4><a href="">{{$service->title}}</a></h4>
                    <p>{{$service->desc}}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->
@endsection