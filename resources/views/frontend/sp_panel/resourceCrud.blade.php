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
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(isset($resourceUpdate))
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        Update Resorce
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('UpdateResource')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$resourceUpdate->id}}">
                            <div class="mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-4 text-right">
                                        ফোন নাম্বার
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="phone" class="form-control" value="{{$resourceUpdate->phone}}" readonly>
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        নাম
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="name" class="form-control w-100" value="{{$resourceUpdate->name}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        জাতীয় পরিচয়পত্রের নাম্বার
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="nationalId_Number" class="form-control" value="{{$resourceUpdate->nationalId_Number}}">
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
                                <button type="button" class="btn btn-secondary">Close</button>
                                <button type="submit" class="btn btn-primary">Update Resource</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif


            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    All Resource
                    <button class="btn btn-primary float-right shadow" data-toggle="modal" data-target="#exampleModal">
                        Add New Resource
                    </button>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered" id="DataTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Phone</th>
                            <th scope="col">National Id</th>
                            <th scope="col">National Id Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($resource_sp as $resource_sps)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td>{{$resource_sps->name}}</td>
                                <td>
                                    <img src="{{asset('storage/nationalId/'.$resource_sps->user_image)}}"
                                         class="img-thumbnail" width="70px" alt="...">
                                </td>
                                <td>{{$resource_sps->phone}}</td>
                                <td>{{$resource_sps->nationalId_Number}}</td>
                                <td class="text-center">
                                    <img src="{{asset('storage/nationalId/'.$resource_sps->nationalId_image1)}}"
                                         class="img-thumbnail" width="70px" alt="...">
                                    <img src="{{asset('storage/nationalId/'.$resource_sps->nationalId_image2)}}"
                                         class="img-thumbnail" width="70px" alt="...">
                                </td>
                                <td class="text-center">
                                    <a href="{{route('resourceCrud')}}/{{$resource_sps->id}}" class="btn btn-sm btn-success mb-2 w-75">Edit</a><br>
                                    <a href="{{url('deleteResource?Delete='.$resource_sps->id)}}"
                                       class="btn btn-sm btn-danger w-75">Delete</a>
                                </td>
                            </tr>
                            <?php $listNum++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Resource Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{url('AddNewResource')}}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="">
                            <div class="row justify-content-center">

                            </div>
                            <div class="mt-3" id="resourceList">
                                <div class="row justify-content-center">
                                    <div class="col-4 text-right">
                                        ফোন নাম্বার
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        নাম
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="name" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-4 text-right">
                                        জাতীয় পরিচয়পত্রের নাম্বার
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="nationalId_Number" class="form-control">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Resource</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

    </div>

@endsection