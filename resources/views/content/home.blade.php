@extends('master')
@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="text-center" >
        <h1 class="display-4" >Choose your way to learn</h1>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background: url('images/slider-bg.jpg') no-repeat fixed center;">
            <div class="text-white text-center" style="height: 80vh; padding-top: 10vh;">
                <h3 style="font-family: 'Amatic SC', cursive; font-size: 10vh;">Education</h3>
                <div class="col-10 col-md-8 mx-auto" style="font-family:  'Fredericka the Great', cursive; font-size: 5vh; margin-top:  10vh;">
                    Develop a passion for learning. If you do, you will never cease to grow.
                </div>
                <p><small>- Anthony J. D'Angelo</small></p>
            </div>
        </div>
        <div class="carousel-item"  style="background: url('images/slider-bg.jpg') no-repeat fixed center;">
            <div class="text-white text-center" style="height: 80vh; padding-top: 10vh;">
                <h3 style="font-family: 'Amatic SC', cursive; font-size: 10vh;">Motivation</h3>
                <div class="col-10 col-md-8 mx-auto" style="font-family:  'Fredericka the Great', cursive; font-size: 5vh; margin-top:  10vh;">
                    We are what we repeatedly do. Excellence, therefore, is not an act but a habit.     
                </div>
                <p><small>- Aristotle</small></p>
            </div>
        </div>
        <div class="carousel-item"  style="background: url('images/slider-bg.jpg') no-repeat fixed center;">


            <div class="text-white text-center" style="height: 80vh; padding-top: 10vh;">
                <h3 style="font-family: 'Amatic SC', cursive; font-size: 10vh;">Technology</h3>
                <div class="col-10 col-md-8 mx-auto" style="font-family:  'Fredericka the Great', cursive; font-size: 5vh; margin-top:  10vh;">
                    Technology can become the “wings” that will allow the educational world to fly.
                </div>
                <p><small>- Jenny Arledge</small></p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <p class="lead">Lorem ipsum dolor sit amet, mea quod epicuri posidonium ei. Vix erant dolorem cu, eum id cibo porro petentium, at his iudico animal dolorum. Cu brute delicata vel. No eos magna partem ridens, in mei novum animal nostrud. Eu est nemore adipisci.</p>
</div>




<!-- ################### carousel 10 + 11 + 12 + 13 -->

<section class="bg-info pt-5 mb-5 rounded-top">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-5">

                <div id="carousel-10" class="carousel slide" data-ride="carousel">
                    <!--product-->
                    <div class="text-center text-light lead mb-1">Check our best courses:</div>
                    <div class="carousel-inner" role="listbox">
                        @foreach ($product as $item)
                        @if ($loop->first)
                        <div class="carousel-item active">
                            @else 
                            <div class="carousel-item">
                                @endif
                                <img class="d-block img-fluid rounded-circle mx-auto col-12" src="{{url("images/{$item['image']}")}}" alt="slide">
                                <div class="carousel-caption ">
                                    <a href="{{url("shop/{$item['cat_url']}/{$item['url']}")}}" class="text-white badge badge-pill badge-secondary col-12"><h5 class="">{{$item['title']}}</h5></a>
                                </div>
                            </div>
                            @endforeach



                        </div><!-- e carousel-inner -->

                        <a class="carousel-control-prev" href="#carousel-10" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">prev</span>
                        </a>

                        <a class="carousel-control-next" href="#carousel-10" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">next</span>
                        </a>

                    </div><!-- e carousel -->

                </div><!-- e col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 -->

                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-5">

                    <div id="carousel-11" class="carousel slide" data-ride="carousel">
                        <!--reviews-->
                        <div class="text-center text-light lead mb-1">Students talk:</div>

                        <div class="carousel-inner" role="listbox">

                            @foreach ($review_article as $item)
                            @if ($loop->first)
                            <div class="carousel-item active">
                                @else 
                                <div class="carousel-item">
                                    @endif
                                    <img class="d-block img-fluid rounded-circle mx-auto col-12" src="{{url("images/{$item['image']}")}}" alt="slide">
                                    <div class="carousel-caption">
                                        <a href="{{url('reviews#').$item['bookmark']}}" class="text-white badge badge-pill badge-secondary col-12"><h5>{{$item['heading']}}</h5></a>
                                    </div>
                                </div>
                                @endforeach
                            </div><!-- e carousel-inner -->

                            <a class="carousel-control-prev" href="#carousel-11" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">prev</span>
                            </a>

                            <a class="carousel-control-next" href="#carousel-11" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">next</span>
                            </a>

                        </div><!-- e carousel -->

                    </div><!-- e col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 -->

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl3 mb-5">
                        <!--blog-->
                        <div id="carousel-12" class="carousel slide" data-ride="carousel">
                            <div class="text-center text-light lead mb-1">Visit our blog:</div>
                            <div class="carousel-inner" role="listbox">
                                @foreach ($blog_article as $item)
                                @if ($loop->first)
                                <div class="carousel-item active">
                                    @else 
                                    <div class="carousel-item">
                                        @endif
                                        <img class="d-block img-fluid rounded-circle mx-auto col-12" src="{{url("images/{$item['image']}")}}" alt="slide">
                                        <div class="carousel-caption">
                                            <a href="{{url('blog#').$item['bookmark']}}" class="text-white badge badge-pill badge-secondary col-12"><h5>{{$item['heading']}}</h5></a>
                                        </div>
                                    </div>
                                    @endforeach


                                </div><!-- e carousel-inner -->

                                <a class="carousel-control-prev" href="#carousel-12" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">prev</span>
                                </a>

                                <a class="carousel-control-next" href="#carousel-12" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">next</span>
                                </a>

                            </div><!-- e carousel -->

                        </div><!-- e col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3-->

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-5">
                            <div id="carousel-13" class="carousel slide" data-ride="carousel">
                                <!--about us-->
                                <div class="text-center text-light lead mb-1">Learn more about us:</div>
                                <div class="carousel-inner" role="listbox">

                                    @foreach ($about_article as $item)
                                    @if ($loop->first)
                                    <div class="carousel-item active">
                                        @else 
                                        <div class="carousel-item">
                                            @endif                                         

                                            <img class="d-block img-fluid rounded-circle mx-auto col-12" src="{{url("images/{$item['image']}")}}" alt="slide">
                                            <div class="carousel-caption">
                                                <a href="{{url('about-us#').$item['bookmark']}}" class="text-white badge badge-pill badge-secondary col-12"><h5>{{$item['heading']}}</h5></a>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div><!-- e carousel-inner -->

                                    <a class="carousel-control-prev" href="#carousel-13" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">prev</span>
                                    </a>

                                    <a class="carousel-control-next" href="#carousel-13" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">next</span>
                                    </a>

                                </div><!-- e carousel -->

                            </div><!-- e col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 -->

                        </div><!-- e row -->
                    </div><!-- e container -->
                    </section><!-- e section -->






                    @endsection
