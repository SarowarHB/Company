@extends('layouts.master_home')


@section('home_content')
<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">
        <br></br>

        <div class="section-title">
            <h2>About Us</strong></h2>
        </div>

        <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
                <h2>{{$abouts->title}}</h2>
                <h3>{{$abouts->short_dis}}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                <p>
                    {{$abouts->long_dis}}
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Us Section -->
@endsection