@extends('frontend.layout.app')

@section('content')

    <style>
        #repair1 .onlyThisPage {
            width: 16px;
            margin-left: auto;
            background-color: white;
            margin-right: auto;
            margin-bottom: 10px;
            margin-top: -9px;
            height: 16px;
            border-radius: 50%;
            border: 3px solid #00c300;

        }
    </style>


    <section id="repair1">
        <div class="w-100 text-center font-weight-bold  my-5 p-2 text-white bg-success">
            TV REPAIR
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 line"></div>
            </div>
            <div class="row text-center serviceListText justify-content-center">
                <div class="col-2">
                    <div class="scoverBall onlyThisPage"></div>
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
                    <div class="scoverBall"></div>
                    <a href="{{route('repair5')}}" class="serviceListText">Check Out</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9 my-4">
                    Select Your Items First
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8 my-4">
                    What is your TV Brand
                    <div class="accordion" id="accordionExample">
                        <div class="card border-0 border-bottom">
                            <div class="card-header bg-white" id="headingOne" data-toggle="collapse"
                                 data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Sony<i class="fas fa-2x fa-caret-down float-right"></i>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body border-bottom">
                                    <table class="table table-borderless w-75">
                                        <thead>
                                        <tr>
                                            <td scope="col">TV Size</td>
                                            <td scope="col">Whats wrong with your TV</td>
                                            <td scope="col">Quantity</td>
                                            <td scope="col"></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>30" - 39"</td>
                                            <td>
                                                <select class="form-control w-100">
                                                    <option></option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn bg-white border">-</button>
                                                    <button type="button" class="btn bg-white border">1</button>
                                                    <button type="button" class="btn bg-white border">+</button>
                                                </div>
                                            </td>
                                            <td><button class="btn bg-white btn-sm border">Add</button></td>
                                        </tr>
                                        <tr>
                                            <td>40" - 49"</td>
                                            <td>
                                                <select class="form-control w-100">
                                                    <option></option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn bg-white border">-</button>
                                                    <button type="button" class="btn bg-white border">1</button>
                                                    <button type="button" class="btn bg-white border">+</button>
                                                </div>
                                            </td>
                                            <td><button class="btn bg-white btn-sm border">Add</button></td>
                                        </tr>
                                        <tr>
                                            <td>50" - 59"</td>
                                            <td>
                                                <select class="form-control w-100">
                                                    <option></option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn bg-white border">-</button>
                                                    <button type="button" class="btn bg-white border">1</button>
                                                    <button type="button" class="btn bg-white border">+</button>
                                                </div>
                                            </td>
                                            <td><button class="btn bg-white btn-sm border">Add</button></td>
                                        </tr>
                                        <tr>
                                            <td>60" - or more"</td>
                                            <td>
                                                <select class="form-control w-100">
                                                    <option></option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn bg-white border">-</button>
                                                    <button type="button" class="btn bg-white border">1</button>
                                                    <button type="button" class="btn bg-white border">+</button>
                                                </div>
                                            </td>
                                            <td><button class="btn bg-white btn-sm border">Add</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group w-75">
                                        <label for="usr">Model Number</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>
                                    <div class="form-group w-75">
                                        <label for="usr">Others</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 border-bottom">
                            <div class="card-header bg-white" id="headingTwo" data-toggle="collapse"
                                 data-target="#collapseTwo" aria-expanded="false"
                                 aria-controls="collapseTwo">
                                        Singer<i class="fas fa-2x fa-caret-down float-right"></i>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="card border-0 border-bottom">
                            <div class="card-header bg-white" id="headingThree" data-toggle="collapse"
                                 data-target="#collapseThree" aria-expanded="false"
                                 aria-controls="collapseThree">
                                        LG<i class="fas fa-2x fa-caret-down float-right"></i>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="card border-0 border-bottom">
                            <div class="card-header bg-white" id="headingThree" data-toggle="collapse"
                                 data-target="#collapseThree" aria-expanded="false"
                                 aria-controls="collapseThree">
                                Walton
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="card border-0 border-bottom">
                            <div class="card-header bg-white" id="headingThree" data-toggle="collapse"
                                 data-target="#collapseThree" aria-expanded="false"
                                 aria-controls="collapseThree">
                                TCL
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="card border-0 border-bottom">
                            <div class="card-header bg-white" id="headingThree" data-toggle="collapse"
                                 data-target="#collapseThree" aria-expanded="false"
                                 aria-controls="collapseThree">
                                Minister
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.service.component.layout')

@endsection