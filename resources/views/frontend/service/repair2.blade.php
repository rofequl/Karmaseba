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
                    <div class="scoverBall onlyThisPage"></div>
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
                    <div class="scoverBall"></div>
                    <a href="{{route('repair5')}}" class="serviceListText">Check Out</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 my-4">
                    Select The Location you need
                    <div class="accordion w-75 mt-3" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne" data-toggle="collapse"
                                 data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="text-center">Home</h4>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body border-bottom">
                                    <div class="form-group">
                                        <label for="usr">Full address (Type your full address)</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>
                                    <input type="submit" value="Save" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 my-4">
                    Your Basket
                    <div class="card">
                        <div class="card-body">

                        </div>
                        <div class="card-footer text-white p-1 text-center bg-success">
                            Continue
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    @include('frontend.service.component.layout')

@endsection