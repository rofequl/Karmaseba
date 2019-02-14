@extends('frontend.layout.app')

@section('content')

    <style>
        .pointer3 {
            background-color: #4a90e2 !important;
        }

        .pointer3:after {
            right: -11px !important;
            border-left: 11px solid #4a90e2 !important;
            border-top: 27px solid transparent !important;
            border-bottom: 25px solid transparent !important;
        }
    </style>

    <section class="bg-light pt-5" id="getInfo">
        <p class="text-center"> দ্রুত কাজ পেতে নিচের তথ্যগুলো প্রদান করুন। </p>
s
        <div id="topNavigator" class="mt-4 pl-5 w-100">
            <ul class="justify-content-center">
                <li class="pointer pointer1"><a href="{{route('getInfo1')}}" class="">ব্যক্তিগত তথ্য
                    </a></li>
                <li class="pointer pointer2"><a href="{{route('getInfo2')}}" class="">অপারেশান সংক্রান্ত তথ্য
                    </a></li>
                <li class="pointer pointer3"><a href="{{route('getInfo3')}}" class="text-white">বিজনেস প্ল্যান
                    </a></li>
                <li class="pointer pointer4"><a href="{{route('getInfo4')}}" class="">অ্যাড সার্ভিস
                    </a></li>
                <li class="pointer pointer5"><a href="{{route('getInfo5')}}" class="">অ্যাড রিসোর্স
                    </a></li>
            </ul>
        </div>


        <div class="container">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <div class="w-100">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-left">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
                <h1 class="display-4"> বিজনেস প্ল্যান </h1>
                <p class="lead"> আপনার সুবিধামত প্ল্যান পছন্দ করুণ এবং সেবাতে রেজিস্ট্রেশন করে আজই সার্ভিস দেয়া শুরু
                    করুন।</p>
            </div>
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$0
                            <small class="text-muted">/ mo</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <form method="post" action="{{url('updateGetInfo3')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="plan" value="Gold">
                            <button type="submit" class="btn btn-lg btn-block btn-outline-success">Gold</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$15
                            <small class="text-muted">/ mo</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>20 users included</li>
                            <li>10 GB of storage</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul>
                        <form method="post" action="{{url('updateGetInfo3')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="plan" value="Platinum">
                            <button type="submit" class="btn btn-lg btn-block btn-outline-success">Platinum</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Enterprise</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$29
                            <small class="text-muted">/ mo</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 users included</li>
                            <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul>
                        <form method="post" action="{{url('updateGetInfo3')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="plan" value="Diamond">
                            <button type="submit" class="btn btn-lg btn-block btn-outline-success">Diamond</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        </div>
    </section>








@endsection