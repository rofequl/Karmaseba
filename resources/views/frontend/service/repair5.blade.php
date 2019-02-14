@extends('frontend.layout.app')

@section('content')

    <style>
        #repair2 .onlyThisPage {
            width: 16px;
            background-color: white;
            margin: -9px auto 10px;
            height: 16px;
            border-radius: 50%;
            border: 3px solid #00c300;

        }
    </style>

    <section id="repair2">
        <div class="w-100 text-center font-weight-bold  my-5 p-2 text-white bg-success">
            TV REPAIR
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 line"></div>
            </div>
            <div class="row text-center serviceListText justify-content-center">
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair1')}}" class="serviceListText">Your Needs</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair2')}}" class="serviceListText">Your Location</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair3')}}" class="serviceListText">Schedule</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair4')}}" class="serviceListText">Select Provider</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall onlyThisPage"></div>
                    <a href="{{route('repair5')}}" class="serviceListText">Check Out</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row my-5">
                <div class="col-6 border-right">
                    <div class="w-50 mx-auto text-left text-justify">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                 alt="User profile picture">
                        </div>

                        <p class="text-muted">Jhon little wine<br>
                            Software Engineer</p>
                        <p class="text-muted">
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="w-50 mx-auto text-left text-justify">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                 alt="User profile picture">
                        </div>

                        <p class="text-muted">Jhon little wine<br>
                            Software Engineer</p>
                        <p class="text-muted">
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-success rounded mx-auto" style="margin-top: -210px;height: 37px;z-index: 1;">
                    Confirm the Provider</button></div>
        </div>
    </section>

    @include('frontend.service.component.layout')

@endsection