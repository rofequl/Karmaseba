@extends('backend.layout.app')
@section('content')

    <!-- Content Wrapper. Contains page Start -->
    <div class="content-wrapper">
        <div class="container mt-3">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible">
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
            @if(isset($servicePanelUpdate))
                <div class="card my-5 shadow">
                    <div class="card-header bg-light">
                        Update Service Panel
                    </div>
                    <form method="post" action="{{route('admin.servicePanelUpdate')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$servicePanelUpdate->id}}">
                            <div class="form-row">
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" value="{{$servicePanelUpdate->service_name}}" id="staticEmail2" name="service_name"
                                           placeholder="Service Name">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success pull-right ml-2">Update</button>
                            <button type="button" class="btn btn-sm btn-secondary pull-right" data-dismiss="modal">
                                Close
                            </button>

                        </div>
                    </form>

                </div>
            @endif
            <div class="card mt-5">
                <div class="card-header bg-green">
                    All Service Panel
                    <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-sm btn-primary float-right shadow-none"> Add Service Panel
                    </button>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered text-center" id="spNotApproveTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Landing page</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($servicePanel as $servicePanels)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td>{{$servicePanels->service_name}}</td>
                                <td>
                                    @if($servicePanels->landing_view == 1)
                                        <a href="{{url('serViewUpdate?Hide=').$servicePanels->id}}"><span
                                                    class="badge badge-pill badge-primary">Show</span></a>
                                    @else
                                        <a href="{{url('serViewUpdate?Show=').$servicePanels->id}}"><span
                                                    class="badge badge-pill badge-secondary">Hide</span></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.servicePanel')}}/{{$servicePanels->id}}"
                                       class="btn btn-sm bg-success">Edit</a>
                                    <a href="{{url('DeleteServicePanel?delete='.$servicePanels->id)}}"
                                       class="btn btn-sm bg-danger delete">Delete</a>
                                </td>
                            </tr>
                            <?php $listNum++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{route('admin.servicePanelInsert')}}"
                              enctype="multipart/form-data">
                            <div class="modal-body">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="col-12 col-md-12">
                                        <input type="text" class="form-control" id="staticEmail2"
                                               name="service_name"
                                               placeholder="Service Panel Name">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection