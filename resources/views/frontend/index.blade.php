@extends('frontend.layout.app')

@section('content')



    <!--Start Masthead Header-->
    <header class="masthead text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class=""><b>Get Your Things Done At Home.</b></h1>
                    <h4 class="mb-5">Chose Highly Experience Task For Help.</h4>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <div class="btn-group" style="font-family: 'Kanit', sans-serif">
                                    <a class="btn mastheadButton dropdown-toggle" data-toggle="dropdown" href="#">Select
                                        Area
                                        <span class="caret"></span></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item textColor fa-1x" href="#">Select Your Location</a>
                                        <a class="dropdown-item text-white active" href="#">Dhanmondi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item textColor" href="#">Mohammadpur</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item textColor" href="#">Motijheel</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item textColor" href="#">Kakrail</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item textColor" href="#">Mohakhali</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item textColor" href="#">Rampura</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <div id="custom-search-input">
                                    <div class="input-group">
                                        <input type="text" class="search-query form-control"
                                               placeholder="Search for a service"/>
                                        <span class="input-group-btn">
                                        <button type="button" disabled>
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--End Masthead Header-->

    <!-- start section services -->
    <section id="services">
        <div class="container py-4">
            <div class="services-carousel text-center row justify-content-center">
                @foreach($serviceCategory as $serviceCategories)
                    @if($serviceCategories->landing_view == 1)
                        <div class="services-block col-12 col-md-4 col-lg-2">
                            <a href="{{route('service')."?service=".$serviceCategories->id}}" class="text-black-50">
                                <img src="{{asset('storage/serviceCategory/'.$serviceCategories->image)}}"
                                     class="img-fluid mx-auto d-block" style="width: 95px!important;">

                                <h6 class="mt-1">{{Session::get('language')=="Bangla" ? $serviceCategories->category_nameBn : $serviceCategories->category_name}}</h6>


                            </a>

                        </div>
                @endif
            @endforeach


            <!---
            <div class="services-block mx-auto">
                <img src="{{asset('image/sicon1.jpg')}}" class="img-fluid mx-auto d-block" style="width: 95px!important;">
                <h4 class="service-heading">Home Appliance</h4>
            </div>
            <div class="services-block mx-auto">
                <img src="{{asset('image/sicon2.jpg')}}" class="img-fluid mx-auto d-block">
                <h4 class="service-heading">Mounting Installing</h4>
            </div>
            <div class="services-block mx-auto">
                <img src="{{asset('image/sicon3.jpg')}}" class="img-fluid mx-auto d-block">
                <h4 class="service-heading">Shifting Pack</h4>
            </div>

            <div class="services-block mx-auto">
                <img src="{{asset('image/sicon4.jpg')}}" class="img-fluid mx-auto d-block">
                <h4 class="service-heading">It-Gadget</h4>
            </div>

            <div class="services-block mx-auto">
                <img src="{{asset('image/sicon5.jpg')}}" class="img-fluid mx-auto d-block">
                <h4 class="service-heading">Clint and Paste control</h4>
            </div>

            <div class="services-block mx-auto">
                <img src="{{asset('image/sicon6.jpg')}}" class="img-fluid mx-auto d-block" style="width: 95px!important;">
                <h4 class="service-heading">Cleaning Service</h4>
            </div>

            --->
            </div>
        </div>
    </section>
    <!-- end section services -->

    <!-- It works Start -->
    <div class="container mb-3" id="headingText">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">How It Works</h2>
            </div>
        </div>
    </div>
    <section class="features-icons text-center pt-3" id="workStart">
        <div class="container py-2 workStartNext">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <img src="{{asset('image/icon1.jpg')}}" class="img-fluid w-25 h-75  mx-auto d-block">
                        </div>
                        <h3>Request</h3>
                        <p class="lead mb-0">let us know what you need</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mt-4 mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <img src="{{asset('image/icon2.jpg')}}" class="mx-auto d-block" width="80px" height="80px">
                        </div>
                        <h3>Get Matched</h3>
                        <p class="lead mb-0">Get Service/product Matched</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mt-4 mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <img src="{{asset('image/icon3.jpg')}}" class="img-fluid w-25 h-75 mx-auto d-block">
                        </div>
                        <h3>Hire</h3>
                        <p class="lead mb-0">Pay directly to the service provider</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- It works End -->

    <!-- Recommended section Start -->
    <section class="my-5" id="recommendedSection">
        <div class="container my-3" id="headingText">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">@if($servicePanel){{$servicePanel->service_name}} @endif Service</h2>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-6">
                    <img src="{{asset('image/home.png')}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-3 text-left">
                    <img src="{{asset('image/bookKnow.png')}}" class="img-fluid w-100">
                    <span class="textFamily">
                    Book for Full Home<br>
                    Cleaning Service<br>
                </span>
                    <button class="btn bg-green mt-3 w-50">Book Now</button>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="recommend-carousel owl-theme text-center">
            @foreach($subcategoryPanel as $subcategoryPanels)
                    <div class="services-block">
                        <img src="{{asset('storage/serviceCategory/'.$subcategoryPanels->image)}}" class="img-fluid rounded" style="width: 100%;height: 200px!important;">
                        <h4 class="service-heading">{{Session::get('language')=="Bangla" ? $subcategoryPanels->subcategory_nameBn : $subcategoryPanels->subcategory_name}}</h4>
                    </div>
            @endforeach

            <!---
                <div class="services-block">
                    <img src="image/repair1.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Home Shifting</h4>
                </div>

                <div class="services-block">
                    <img src="image/repair2.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Tv Repair</h4>
                </div>

                <div class="services-block">
                    <img src="image/repair3.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Home Shifting</h4>
                </div>

                <div class="services-block">

                    <img src="image/repair1.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Tv Repair</h4>
                </div>

                <div class="services-block">

                    <img src="image/repair5.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Home Shifting</h4>
                </div>

                <div class="services-block">

                    <img src="image/repair1.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Tv Repair</h4>
                </div>
                <div class="services-block">

                    <img src="image/repair2.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Home Shifting</h4>
                </div>
                <div class="services-block">

                    <img src="image/repair3.jpg" class="img-fluid rounded">
                    <h4 class="service-heading">Tv Repair</h4>
                </div>
                --->

            </div>
        </div>
    </section>
    <!-- Recommended section End -->

    <!-- Real people section Start -->
    <div class="container mt-3" id="headingText">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Real people, Real task</h2>
            </div>
        </div>
    </div>
    <section class="bg-light" id="realPeople">
        <div class="container pt-5">
            <div class="row justify-content-center realPeople-image">
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="image/people1.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            Using TaskRabbit to have a new bookcase built was a great choice! Rick did wonderful work
                            with a
                            job that was much bigger than we anticipated.<br><br><br>
                            <span>
                    Biplab Banik,<br>
                    Dhanmondi Dhaka
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="image/people2.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            I finally have expertly installed shelves and additional storage in my tiny apartment, all
                            thanks to my Tasker.<br><br><br>
                            <span>
                    Lein Chang<br>
                    Gulshan 2.. Dhaka
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="image/people3.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            I'd been agonizing over how to get my new flat screen mounted to my wall. In comes Nick on
                            the
                            same day. He arrived with all the tools for the job and was just a super nice
                            guy.<br><br><br>
                            <span>
                    Rea Joe<br>
                    Gulshan 2.. Dhaka
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="image/people4.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            TaskRabbit makes moving into your new apartment a 1 hr job instead of 1 day job! Moving my
                            belongings from Manhattan to Queens was seamless.<br><br><br>
                            <span>
                    Riardo Pillar<br>
                    Uttara 2.. Dhaka
                         </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Real people section Start -->

    <!-- Coverage Area section Start -->
    <div class="container my-5" id="headingText">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Coverage Area</h2>
            </div>
        </div>
    </div>
    <section id="coverageArea" class="py-3">
        <div class="container mb-5">
            <div class="row areaName">
                <div class="col-lg-3 col-md-6">
                    Barisal<br>
                    Sunamganj<br>
                    Munshiganj<br>
                    Moulvibazar<br>
                    Narayanganj<br>
                    Habiganj<br>
                </div>
                <div class="col-lg-3 col-md-6">
                    Rangpur<br>
                    Panchagarh<br>
                    Nilphamari<br>
                    Lalmonirhat<br>
                    Dinajpur<br>
                    Munshiganj<br>
                </div>
                <div class="col-lg-3 col-md-6">
                    Barisal<br>
                    Sunamganj<br>
                    Munshiganj<br>
                    Moulvibazar<br>
                    Narayanganj<br>
                    Habiganj<br>
                </div>
                <div class="col-lg-3 col-md-6">
                    Rangpur<br>
                    Panchagarh<br>
                    Nilphamari<br>
                    Lalmonirhat<br>
                    Dinajpur<br>
                    Munshiganj<br>
                </div>
            </div>
        </div>
    </section>
    <!-- Coverage Area section End -->

    <!-- Get help section Start -->
    <section class="bg-light" id="getHelp">
        <div class="container mb-5 py-3" id="headingText">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Get Helped</h2>
                </div>
            </div>
        </div>
        <div class="container my-3 pb-3 mb-5">
            <div class="row getHelpName">
                <div class="col-lg-3 col-md-6">
                    <img src="image/help.png" class="img-fluid w-50">
                </div>
                <div class="col-lg-3 col-md-6">
                    Cougar Investment<br>
                    Cougar Investment<br>
                    Cut Rite Lawn Care<br>
                    Bold Ideas<br>
                    Electronic Geek<br>
                    Future Bright<br>
                </div>
                <div class="col-lg-3 col-md-6">
                    Cougar Investment<br>
                    Cougar Investment<br>
                    Cut Rite Lawn Care<br>
                    Bold Ideas<br>
                    Electronic Geek<br>
                    Future Bright<br>
                </div>
                <div class="col-lg-3 col-md-6">
                    Cougar Investment<br>
                    Cougar Investment<br>
                    Cut Rite Lawn Care<br>
                    Bold Ideas<br>
                    Electronic Geek<br>
                    Future Bright<br>
                </div>
            </div>
        </div>
    </section>
    <!-- Get help section Start -->




@endsection