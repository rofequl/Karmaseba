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
                    <div class="scoverBall onlyThisPage"></div>
                    <a href="{{route('repair4')}}" class="serviceListText">Select Provider</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair5')}}" class="serviceListText">Check Out</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="text-center my-5">
                <h2>Pick a Tasker</h2>
                <p>After Booking you can chat with your tasker. agree on an exact time</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div>
                        Task Date <br>
                        <button class="btn btn-sm btn-secondary w-50 my-2">Today</button>
                        <button class="btn btn-sm btn-success">Within 3 days</button>
                        <button class="btn btn-sm w-50">Within a week</button>
                        <button class="btn btn-sm">Within a week</button>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                    </div>

                                    <p class="text-muted text-center">Software Engineer</p>

                                    <a href="#" class="btn btn-success btn-block"><b>Follow</b></a>
                                    <p class="text-muted text-center">
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="">
                                <h2>Laourence P.</h2>
                                <h4>Senior Technician</h4>
                                <h4>How I Can help</h4>
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                    </div>

                                    <p class="text-muted text-center">Software Engineer</p>

                                    <a href="#" class="btn btn-success btn-block"><b>Follow</b></a>
                                    <p class="text-muted text-center">
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="">
                                <h2>Laourence P.</h2>
                                <h4>Senior Technician</h4>
                                <h4>How I Can help</h4>
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('frontend.service.component.layout')

@endsection