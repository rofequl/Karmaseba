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
            <div class="card shadow my-4">
                <div class="card-header p-1">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Schedule Approve</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Schedule Not Approve</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form class="form-inline" action="{{ url('TimeAddSchedule1') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="sr-only" for="exampleFormControlSelect1">Example select</label>
                                    <select name="day" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Select Day</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <select name="hour" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Select Hour</option>
                                        <option value="h1">9.00am - 10.59am</option>
                                        <option value="h2">11.00am - 12.59pm</option>
                                        <option value="h3">1.00pm - 2.59pm</option>
                                        <option value="h4">3.00pm - 4.59pm</option>
                                        <option value="h5">5.00pm - 6.59pm</option>
                                        <option value="h6">7.00pm - 9.00pm</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mx-sm-3 mb-2">Approve</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="form-inline" action="{{ url('TimeAddSchedule2') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="sr-only" for="exampleFormControlSelect1">Example select</label>
                                    <select name="day" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Select Day</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <select name="hour" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Select Hour</option>
                                        <option value="h1">9.00am - 10.59am</option>
                                        <option value="h2">11.00am - 12.59pm</option>
                                        <option value="h3">1.00pm - 2.59pm</option>
                                        <option value="h4">3.00pm - 4.59pm</option>
                                        <option value="h5">5.00pm - 6.59pm</option>
                                        <option value="h6">7.00pm - 9.00pm</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger mx-sm-3 mb-2">Not Approve</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header bg-success">
                    Service Provider Schedule
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Day</th>
                            <th>9.00am - 10.59am</th>
                            <th>11.00am - 12.59pm</th>
                            <th>1.00pm - 2.59pm</th>
                            <th>3.00pm - 4.59pm</th>
                            <th>5.00pm - 6.59pm</th>
                            <th>7.00pm - 9.00pm</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($spShedule as $spShedules)
                            <tr>
                                <td>{{$spShedules->day}}</td>
                                <td>
                                    @if($spShedules->h1 == 0)
                                        <span class="badge badge-pill badge-danger">Leave</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Available</span>
                                    @endif
                                </td>
                                <td>
                                    @if($spShedules->h2 == 0)
                                        <span class="badge badge-pill badge-danger">Leave</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Available</span>
                                    @endif
                                </td>
                                <td>
                                    @if($spShedules->h3 == 0)
                                        <span class="badge badge-pill badge-danger">Leave</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Available</span>
                                    @endif
                                </td>
                                <td>
                                    @if($spShedules->h4 == 0)
                                        <span class="badge badge-pill badge-danger">Leave</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Available</span>
                                    @endif
                                </td>
                                <td>
                                    @if($spShedules->h5 == 0)
                                        <span class="badge badge-pill badge-danger">Leave</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Available</span>
                                    @endif
                                </td>
                                <td>
                                    @if($spShedules->h6 == 0)
                                        <span class="badge badge-pill badge-danger">Leave</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Available</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>

@endsection