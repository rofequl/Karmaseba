@extends('frontend.layout.app')
@section('content')







    <!-- Content Wrapper. Contains page Start -->
    <div class="container mt-3">

        <div class="card card-widget widget-user-2 mb-5">
            <div class="widget-user-header bg-success">
                <div class="widget-user-image">
                    <img class="elevation-2"
                         src="{{asset('storage/nationalId')."/".$userInformation->user_image}}"
                         alt="User Avatar">
                </div>
                <h3 class="widget-user-username">{{$userInformation->name}}</h3>
                <h5 class="widget-user-desc">{{$register_user->phone}}</h5>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-6">
                        <ul class="nav flex-column">
                            <li class="nav-item p-2">
                                National Id Number <span
                                        class="float-right">{{$userInformation->nationalId_Number}}</span>
                            </li>
                            <li class="nav-item p-2">
                                National Id Image <span class="float-right"><img class="img-thumbnail"
                                                                                 style="width: 100px;"
                                                                                 src="{{asset('storage/nationalId')."/".$userInformation->nationalId_image1}}">
                                    <img class="img-thumbnail" style="width: 100px;"
                                         src="{{asset('storage/nationalId')."/".$userInformation->nationalId_image2}}">
                                </span>
                            </li>
                            <li class="nav-item p-2">
                                Business Plan <span
                                        class="float-right">{{$businessPlan->plan}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="nav flex-column">
                            <li class="nav-item p-2">
                                Company Name: <span
                                        class="float-right">{{$operationInformation->company_name}}</span>
                            </li>
                            <li class="nav-item p-2">
                                Email: <span
                                        class="float-right">{{$operationInformation->email}}</span>
                            </li>
                            <li class="nav-item p-2">
                                Service Location <span
                                        class="float-right">{{$operationInformation->service_location}}</span>
                            </li>

                            <li class="nav-item p-2">
                                Delivery Type<span
                                        class="float-right">{{$operationInformation->delivery_type}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('getInfo1')}}" class="btn btn-warning">Previous Page</a>
                <a href="{{route('regSuccess')}}" class="btn btn-success">Submit form</a>
            </div>
        </div>
    </div>








@endsection