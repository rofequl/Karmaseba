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
            <div class="row m-4">
                <button class="btn btn-primary ml-auto" type="button" data-toggle="modal"
                        data-target="#exampleModal">
                    Add Terms and Conditions
                </button>
            </div>

            @if(isset($spTermsConditionUpdate))
                <div class="card shadow mb-5">
                    <div class="card-header bg-success text-white">
                        Update Terms & Condition
                    </div>
                    <form method="post" action="{{url('UpdateTermsCondition')}}">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$spTermsConditionUpdate->id}}">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" value="{{$spTermsConditionUpdate->title}}" name="title"
                                       class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" name="message"
                                          id="message-text">{{$spTermsConditionUpdate->message}}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('termsCondition')}}" class="btn btn-secondary">Close</a>
                            <button type="submit" class="btn btn-primary">Update message</button>
                        </div>
                    </form>
                </div>
            @endif

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{url('AddTermsCondition')}}">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" name="message" id="message-text"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Terms and Conditions
                </div>
                <div class="card-body p-0">
                    @foreach($spTermsCondition as $spTermsConditions)
                        <div class="media p-2">
                            <div class="dropdown ml-auto">
                                <button class="btn btn-secondary shadow-none" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-sliders-h"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{route('termsCondition')}}/{{$spTermsConditions->id}}"
                                       class="dropdown-item">Edit</a>
                                    <a href="{{url('DeleteTermsCon?delete='.$spTermsConditions->id)}}"
                                       class="dropdown-item delete">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <h4>{{$spTermsConditions->title}}</h4>
                            <p>{{$spTermsConditions->message}}</p>
                        </div>

                        <hr class="bg-dark">
                    @endforeach
                </div>
            </div>


        </div>


    </div>






@endsection