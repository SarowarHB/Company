@extends('layouts.master_home')


@section('home_content')

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
</section><!-- End Portfolio Section -->
@endsection