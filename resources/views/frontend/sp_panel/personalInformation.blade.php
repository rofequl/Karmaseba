@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">
        <div class="container mt-3">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{$error}}
                    </div>
                @endforeach
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="collapse" id="collapseExample">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        Update Resorce
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('UpdateSpProfile')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$userInformation->id}}">
                            <div class="mt-3">
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        নাম
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="name" class="form-control w-100"
                                               value="{{$userInformation->name}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        জাতীয় পরিচয়পত্রের নাম্বার
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="nationalId_Number" class="form-control"
                                               value="{{$userInformation->nationalId_Number}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        জাতীয় পরিচয়পত্র আপলোড করুন
                                    </div>
                                    <div class="col-8">
                                        <button type="button" onclick="chooseFile()" class="btn btn-secondary">উপরের
                                            পাতা
                                        </button>
                                        <input type="file" name="nationalId_image1" id="fileInput" class="d-none">

                                        <button type="button" onclick="chooseFile2()" class="btn btn-secondary">নিচের
                                            পাতা
                                        </button>
                                        <input type="file" name="nationalId_image2" id="fileInput2" class="d-none">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-5">
                                    <div class="col-4 text-right">

                                    </div>
                                    <div class="col-8 bg-light p-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="{{asset('image/sp/NID.jpg')}}" class="img-fluid">
                                                ১।কোন সাদা কাগজের উপরে আপনার জাতীয় পরিচয়পত্র রেখে সেটার উপরের অংশের ছবি
                                                তুলুন অথবা
                                                স্ক্যান
                                                করুন
                                                এবং সেভ করে রাখুন
                                                ২। লক্ষ্য রাখবেন যাতে ছবিতে সব লেখা স্পষ্ট থাকে
                                            </div>
                                            <div class="col-6">
                                                <img src="{{asset('image/sp/NID2.jpg')}}" class="img-fluid">
                                                ১।কোন সাদা কাগজের উপরে আপনার জাতীয় পরিচয়পত্র রেখে সেটার উপরের অংশের ছবি
                                                তুলুন অথবা
                                                স্ক্যান
                                                করুন
                                                এবং সেভ করে রাখুন
                                                ২। লক্ষ্য রাখবেন যাতে ছবিতে সব লেখা স্পষ্ট থাকে
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        আপনার ছবি আপলোড করুন
                                    </div>
                                    <div class="col-8">
                                        <button type="button" onclick="chooseFile3()" class="btn btn-secondary">ছবি
                                            আপলোড করুন
                                        </button>
                                        <input type="file" name="user_image" id="fileInput3" class="d-none">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-5">
                                    <div class="col-4 m-1 text-right">

                                    </div>
                                    <div class="col-8 bg-light p-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="{{asset('image/sp/ValidHead.jpg')}}" class="img-fluid">
                                            </div>
                                            <div class="col-6">
                                                ১।কোন সাদা কাগজের উপরে আপনার জাতীয় পরিচয়পত্র রেখে সেটার উপরের অংশের ছবি
                                                তুলুন অথবা
                                                স্ক্যান
                                                করুন
                                                এবং সেভ করে রাখুন
                                                ২। লক্ষ্য রাখবেন যাতে ছবিতে সব লেখা স্পষ্ট থাকে
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    Close
                                </a>
                                <button type="submit" class="btn btn-primary">Update Resource</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card card-widget widget-user-2 mb-5">
                <div class="widget-user-header bg-success">
                    <div class="widget-user-image">
                        <img class="elevation-2"
                             src="{{asset('storage/nationalId/'.$userInformation->user_image)}}"
                             alt="User Avatar">
                    </div>
                    <h3 class="widget-user-username">{{$userInformation->name}}</h3>
                    <h5 class="widget-user-desc"><?php echo getIdByName($userInformation->user_id, "register_users", "user_id", "phone");?></h5>
                </div>
                <div class="card-body p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item p-2">
                            Email <span class="float-right"><?php echo getIdByName($userInformation->user_id, "operation_informations", "user_id", "email");?></span>
                        </li>
                        <li class="nav-item p-2">
                            Company Name <span class="float-right"><?php echo getIdByName($userInformation->user_id, "operation_informations", "user_id", "company_name");?></span>
                        </li>
                        <li class="nav-item p-2">
                            National Id Number <span class="float-right">{{$userInformation->nationalId_Number}}</span>
                        </li>
                        <li class="nav-item p-2">
                            National Id Image <span class="float-right"></span>
                        </li>

                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        Edit
                    </a>
                </div>
            </div>


        </div>
    </div>

@endsection