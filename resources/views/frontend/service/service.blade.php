@extends('frontend.layout.app')

@section('content')

    <section id="serviceList" class="my-5">
        <div class="container">
            <div class="row my-3 serviceListText justify-content-center">
                @foreach($serviceSubcategory as $serviceSubcategorys)
                    <div class="col col-md-4 col-lg-2">
                        <a href="{{route('repair1')}}" class="serviceListText">
                            <img src="{{asset('storage/serviceCategory/'.$serviceSubcategorys->image)}}" class="img-fluid ser">
                            {{$serviceSubcategorys->subcategory_name}}
                        </a>
                    </div>
            @endforeach

            <!---
                <div class="col col-md-4 col-lg-2"><a href="{{route('repair1')}}" class="serviceListText">
                    <img src="{{asset('image/service/ser1.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                    </a></div>
                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser2.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>
                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser3.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>
                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser4.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>

                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser5.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>
                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser6.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>
                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser7.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>
                <div class="col col-md-4 col-lg-2">
                    <img src="{{asset('image/service/ser8.jpg')}}" class="img-fluid ser">
                    Repair A Water Filter
                </div>
                --->
            </div>

            <div class="row my-5">
                <div class="col-3 offset-2">
                    <div class="form-check">
                        <label class="form-check-label" for="check1">
                            <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something"
                                   checked>Collect and Return
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                   value="something">Service at Service Center
                        </label>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center my-5 py-5">
                <div class="col-8 text-center">
                    <h3>Terms and Condition</h3>
                    <p>
                        Provider with collect, repair and then return your device, If you
                        choose, Collect an return. The service will charge 500 BDT with your
                        selected service.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.service.component.layout')

@endsection