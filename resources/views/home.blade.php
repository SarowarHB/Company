@extends('layouts.master_home')
@include('layouts.body.slider')

@section('home_content')





<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

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

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Services</strong></h2>
            <p>Build perfect websites, Beautifully handcrafted templates for your website</p>
        </div>



        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100"  >
                <div class="icon-box iconbox-blue">
                    <div class="icon">
                        <img src="{{$service->image}}" class="img-fluid" alt="">
                    </div>
                    <h4><a href="">{{$service->title}}</a></h4>
                    <p>{{$service->desc}}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <br></br>
            <h2>Portfolio</h2>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

        @php($a=1)
            @foreach($apps as $app)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{$app->image}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App {{$a++}} </h4>
                    <p>App</p>
                    <a href="{{$app->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i
                            class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>
            @endforeach

            @php($w=1)
            @foreach($webs as $web)

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{$web->image}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web {{$w++}}</h4>
                    <p>Web</p>
                    <a href="{{$web->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i
                            class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>
            @endforeach

            @php($c=1)
            @foreach($cards as $card)
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="{{$card->image}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card {{$c++}}</h4>
                    <p>Card</p>
                    <a href="{{$card->image}}" data-gall="portfolioGallery" class="venobox preview-link"
                        title="Card "><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section><!-- End Portfolio

<!-- ======= Our Clients Section ======= -->
<section id="clients" class="clients">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Brands</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

            @foreach($brands as $brand)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                    <img src="{{$brand->brand_image}}" class="img-fluid" alt="">
                </div>
            </div>
            @endforeach



        </div>

    </div>
</section><!-- End Our Clients Section -->

@endsection
