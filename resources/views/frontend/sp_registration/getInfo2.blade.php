@extends('frontend.layout.app')
@section('content')
    <style>
        .pointer2 {
            background-color: #4a90e2 !important;
        }

        .pointer2:after {
            right: -11px !important;
            border-left: 11px solid #4a90e2 !important;
            border-top: 27px solid transparent !important;
            border-bottom: 25px solid transparent !important;
        }
    </style>

    <section class="bg-light pt-5" id="getInfo">
        <p class="text-center"> দ্রুত কাজ পেতে নিচের তথ্যগুলো প্রদান করুন। </p>
        <div id="topNavigator" class="mt-4 pl-5 w-100">
            <ul class="justify-content-center">
                <li class="pointer pointer1"><a href="{{route('getInfo1')}}" class="">ব্যক্তিগত তথ্য
                    </a></li>
                <li class="pointer pointer2"><a href="{{route('getInfo2')}}" class="text-white">অপারেশান সংক্রান্ত তথ্য
                    </a></li>
                <li class="pointer pointer3"><a href="{{route('getInfo3')}}" class="">বিজনেস প্ল্যান
                        <span class="done-tick"></span></a></li>
                <li class="pointer pointer4"><a href="{{route('getInfo4')}}" class="">অ্যাড সার্ভিস
                    </a></li>
                <li class="pointer pointer5"><a href="{{route('getInfo5')}}" class="">অ্যাড রিসোর্স
                    </a></li>
            </ul>
        </div>

        <div class="container bg-white py-3">
            <div class="w-100">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <h4 class="font-weight-normal text-center my-5"> অপারেশান সংক্রান্ত তথ্য </h4>
                <form method="post" action="{{url('updateGetInfo2')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$spShedule->id}}">
                    <div class="row justify-content-center">
                        <div class="col-3 m-1 text-right">
                            কোম্পানির নাম
                        </div>
                        <div class="col-3">
                            <input type="text" name="company_name" class="form-control" value="{{$spShedule->company_name}}">
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">
                            ইমেল আইডি
                        </div>
                        <div class="col-3">
                            <input type="text" name="email" class="form-control" value="{{$spShedule->email}}">
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">
                            সার্ভিস এলাকা
                        </div>
                        <div class="col-3">
                            <input type="text" name="service_location" class="form-control" value="{{$spShedule->service_location}}">
                        </div>
                    </div>
                    <div class="row justify-content-center my-4 d-none">
                        <div class="col-6 m-1 text-right">
                            <div id="map" style="width:100%;height:200px;margin:0;"></div>
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">
                            সার্ভিস ডেলিভারি টাইপ
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <?php
                                    $str = explode(",",$spShedule->delivery_type);
                                ?>
                                <label class="form-check-label">
                                    <input type="checkbox" name="favorite[]" class="form-check-input" value="Home Service"
                                           @if(in_array("Home Service",$str))  {{"checked"}} @endif
                                    >হোম সার্ভিস

                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="favorite[]" class="form-check-input" value="Shop Point"
                                    @if(in_array("Shop Point",$str))  {{"checked"}} @endif
                                    >শপ/সার্ভিস পয়েন্ট
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">

                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-success">জমা দিন</button>
                        </div>
                    </div>
                </form>
        </div>


    </section>


@endsection