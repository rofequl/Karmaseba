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
            @if(isset($spBusyDayUpdate))
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        Leave Table Update
                    </div>
                    <div class="card-body">
                        <form class="form-inline" action="{{ url('BusyDayUpdate') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$spBusyDayUpdate->id}}">
                            <div class="form-group mb-2">
                                <label for="datepicker3" class="sr-only">Email</label>
                                <input type="text" id="datepicker3" name="start_date" class="form-control"
                                       value="{{$spBusyDayUpdate->start_date}}">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="datepicker4" class="sr-only">Password</label>
                                <input type="text" name="end_date" class="form-control" id="datepicker4"
                                        value="{{$spBusyDayUpdate->end_date}}">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Submit Date</button>
                            <button type="button" class="btn btn-warning mx-3 mb-2">Close</button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Leave Table
                    <button class="btn btn-primary float-right shadow" data-toggle="modal"
                            data-target=".bd-example-modal-sm">
                        Add Leave
                    </button>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered" id="DataTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($spLeave as $spLeaves)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td>{{$spLeaves->start_date}}</td>
                                <td>{{$spLeaves->end_date}}</td>
                                <td class="text-center">
                                    <a href="{{route('spBusyDay')}}/{{$spLeaves->id}}"
                                       class="btn btn-sm btn-success mb-2 w-75">Edit</a><br>
                                    <a href="{{url('spBusyDayDelete?delete='.$spLeaves->id)}}"
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
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" role="document">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Leave date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('BusyDayAdd') }}" method="post">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group mb-2">
                                <label for="datepicker" class="sr-only">Email</label>
                                <input type="text" id="datepicker" name="start_date" class="form-control"
                                       placeholder="Start Date">
                            </div>
                            <div class="form-group mb-2">
                                <label for="datepicker2" class="sr-only">Password</label>
                                <input type="text" name="end_date" class="form-control" id="datepicker2"
                                       placeholder="End Date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Date</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection