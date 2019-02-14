@extends('frontend.layout.app')

@section('content')

    <style>
        .pointer1 {
            background-color: #4a90e2 !important;
        }

        .pointer1:after {
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
                <li class="pointer pointer1"><a href="{{route('getInfo1')}}" class="text-white">ব্যক্তিগত তথ্য
                    </a></li>
                <li class="pointer pointer2"><a href="{{route('getInfo2')}}" class="">অপারেশান সংক্রান্ত তথ্য
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
            <h4 class="font-weight-normal text-center my-5"> ব্যক্তিগত তথ্য </h4>
                <form method="post" action="{{url('updateGetInfo1')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$spShedule->id}}">
                    <div class="row justify-content-center">
                        <div class="col-3 m-1 text-right">
                            ফোন নাম্বার
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" value="{{Session::get('phone')}}" readonly>
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-4 m-1 text-right">
                            নাম
                        </div>
                        <div class="col-4">
                            <input type="text" name="name" value="{{$spShedule->name}}" class="form-control w-100">
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">
                            জাতীয় পরিচয়পত্রের নাম্বার
                        </div>
                        <div class="col-3">
                            <input type="text" name="nationalId_Number" value="{{$spShedule->nationalId_Number}}" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">
                            জাতীয় পরিচয়পত্র আপলোড করুন
                        </div>
                        <div class="col-3">
                            <button type="button" onclick="chooseFile()" class="btn btn-secondary">উপরের পাতা</button>
                            <input type="file" name="nationalId_image1" id="fileInput" class="d-none">

                            <button type="button" onclick="chooseFile2()" class="btn btn-secondary">নিচের পাতা</button>
                            <input type="file" name="nationalId_image2" id="fileInput2" class="d-none">
                        </div>
                    </div>
                    <div class="row justify-content-center my-5">
                        <div class="col-5 m-1 text-right">

                        </div>
                        <div class="col-5 bg-light p-3">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{asset('image/sp/NID.jpg')}}" class="img-fluid">
                                    ১।কোন সাদা কাগজের উপরে আপনার জাতীয় পরিচয়পত্র রেখে সেটার উপরের অংশের ছবি তুলুন অথবা
                                    স্ক্যান
                                    করুন
                                    এবং সেভ করে রাখুন
                                    ২। লক্ষ্য রাখবেন যাতে ছবিতে সব লেখা স্পষ্ট থাকে
                                </div>
                                <div class="col-6">
                                    <img src="{{asset('image/sp/NID2.jpg')}}" class="img-fluid">
                                    ১।কোন সাদা কাগজের উপরে আপনার জাতীয় পরিচয়পত্র রেখে সেটার উপরের অংশের ছবি তুলুন অথবা
                                    স্ক্যান
                                    করুন
                                    এবং সেভ করে রাখুন
                                    ২। লক্ষ্য রাখবেন যাতে ছবিতে সব লেখা স্পষ্ট থাকে
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                        <div class="col-3 m-1 text-right">
                            আপনার ছবি আপলোড করুন
                        </div>
                        <div class="col-3">
                            <button type="button" onclick="chooseFile3()" class="btn btn-secondary">ছবি আপলোড করুন</button>
                            <input type="file" name="user_image" id="fileInput3" class="d-none">
                        </div>
                    </div>
                    <div class="row justify-content-center my-5">
                        <div class="col-5 m-1 text-right">

                        </div>
                        <div class="col-5 bg-light p-3">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{asset('image/sp/ValidHead.jpg')}}" class="img-fluid">
                                </div>
                                <div class="col-6">
                                    ১।কোন সাদা কাগজের উপরে আপনার জাতীয় পরিচয়পত্র রেখে সেটার উপরের অংশের ছবি তুলুন অথবা
                                    স্ক্যান
                                    করুন
                                    এবং সেভ করে রাখুন
                                    ২। লক্ষ্য রাখবেন যাতে ছবিতে সব লেখা স্পষ্ট থাকে
                                </div>
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

    <script>
        // image upload file open
        function chooseFile() {
            $("#fileInput").click();
        }

        // image upload file open
        function chooseFile2() {
            $("#fileInput2").click();
        }

        // image upload file open
        function chooseFile3() {
            $("#fileInput3").click();
        }
    </script>



@endsection