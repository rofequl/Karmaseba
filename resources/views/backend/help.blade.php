@extends('backend.layout.app')
@section('content')

    <!-- Content Wrapper. Contains page Start -->
    <div class="content-wrapper">
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

                <div class="card shadow mb-5">
                    <div class="card-header bg-success text-white">
                        What kind of help is needed?
                    </div>
                    <form method="post" action="{{url('SendHelp')}}">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" name="title"
                                       class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Help:</label>
                                <textarea class="form-control" name="help"
                                          id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="bg-light p-3 border-top">
                            <button type="submit" class="btn btn-sm btn-primary">Send Help Request</button>
                        </div>
                    </form>
                </div>


                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        All the help you wanted
                    </div>
                    <div class="card-body p-0">
                        @foreach($spHelp as $spHelps)
                            <div class="m-2">
                                <p class="float-right"
                                   style="font-size: 13px;">{{$spHelps->updated_at->diffForHumans()}}
                                    <a href="{{url('AdminSpHelp?delete='.$spHelps->id)}}" class="btn btn-sm btn-danger ml-2">Delete</a>
                                </p>
                                <h4>{{$spHelps->title}}</h4>
                                <p>{{$spHelps->help}}</p>
                            </div>

                            <hr>
                        @endforeach
                    </div>
                </div>



        </div>
    </div>
@endsection