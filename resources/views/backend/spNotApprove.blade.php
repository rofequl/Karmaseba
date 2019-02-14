@extends('backend.layout.app')
@section('content')

    <!-- Content Wrapper. Contains page Start -->
    <div class="content-wrapper">
        <div class="container mt-3">

            @if(isset($spRegisterProfile))
                <div class="card card-widget widget-user-2 mb-5">
                    <div class="widget-user-header bg-success">
                        <div class="widget-user-image">
                            <img class="elevation-2"
                                 src="{{asset('storage/nationalId/')}}<?php echo "/" . getIdByName($spRegisterProfile->user_id, "user_informations", "user_id", "user_image");?>"
                                 alt="User Avatar">
                        </div>
                        <h3 class="widget-user-username"><?php echo getIdByName($spRegisterProfile->user_id, "user_informations", "user_id", "name");?></h3>
                        <h5 class="widget-user-desc">{{$spRegisterProfile->phone}}</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item p-2">
                                Company Name: <span
                                        class="float-right"><?php echo getIdByName($spRegisterProfile->user_id, "operation_informations", "user_id", "company_name");?></span>
                            </li>
                            <li class="nav-item p-2">
                                Email: <span
                                        class="float-right"><?php echo getIdByName($spRegisterProfile->user_id, "operation_informations", "user_id", "email");?></span>
                            </li>
                            <li class="nav-item p-2">
                                National Id Number <span class="float-right"><?php echo getIdByName($spRegisterProfile->user_id, "user_informations", "user_id", "nationalId_Number");?></span>
                            </li>
                            <li class="nav-item p-2">
                                National Id Image <span class="float-right"><img class="img-thumbnail" style="width: 100px;"
                                                                                 src="{{asset('storage/nationalId/')}}<?php echo "/" . getIdByName($spRegisterProfile->user_id,
                                                                                         "user_informations", "user_id", "nationalId_image1");?>">
                                    <img class="img-thumbnail" style="width: 100px;"
                                         src="{{asset('storage/nationalId/')}}<?php echo "/" . getIdByName($spRegisterProfile->user_id,
                                                 "user_informations", "user_id", "nationalId_image2");?>">
                                </span>
                            </li>
                            <li class="nav-item p-2">
                                Business Plan <span
                                        class="float-right"><?php echo getIdByName($spRegisterProfile->user_id, "business_plans", "user_id", "plan");?></span>
                            </li>
                            <li class="nav-item p-2">
                                Service Location <span
                                        class="float-right"><?php echo getIdByName($spRegisterProfile->user_id, "operation_informations", "user_id", "service_location");?></span>
                            </li>
                            <li class="nav-item p-2">
                                Delivery type <span
                                        class="float-right"><?php echo getIdByName($spRegisterProfile->user_id, "operation_informations", "user_id", "delivery_type");?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('spNotApprove')}}" class="btn btn-warning">Close</a>
                        <a href="{{url('AdminSPUpdate?updateA='.$spRegisterProfile->id)}}" class="btn btn-success approveAlert">Approve</a>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-success">
                    Not Approve Service provider
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered" id="spNotApproveTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Phone</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($sp_register as $sp_registers)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td>{{$sp_registers->phone}}</td>
                                <td>{{$sp_registers->user_id}}</td>
                                <td class="text-center">
                                    <a href="{{route('spNotApprove')}}/{{$sp_registers->id}}"
                                       class="btn btn-sm btn-success mx-1"> View</a>
                                </td>
                            </tr>
                            <?php $listNum++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>
    <!-- Content Wrapper. Contains page End -->






@endsection