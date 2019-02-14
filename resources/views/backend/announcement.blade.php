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
                <button class="btn btn-primary ml-auto" type="button" data-toggle="collapse"
                        data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                    Add Announcement
                </button>
            </div>

            @if(isset($spAnnouncementUpdate))
                <div class="card shadow mb-5">
                    <div class="card-header bg-success text-white">
                        Update Announcement
                    </div>
                    <form method="post" action="{{url('UpdateAnnouncement')}}">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$spAnnouncementUpdate->id}}">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" value="{{$spAnnouncementUpdate->title}}" name="title"
                                       class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="description"
                                          id="message-text">{{$spAnnouncementUpdate->description}}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('termsCondition')}}" class="btn btn-secondary">Close</a>
                            <button type="submit" class="btn btn-primary">Update message</button>
                        </div>
                    </form>
                </div>
            @endif

            <div class="collapse" id="collapseExample">
                <div class="card">
                    <div class="card-header bg-success">
                        Select Service provider
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-striped table-bordered" id="spNotApproveTable">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Choose</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="{{asset('image/sicon1.jpg')}}" class="mr-3 img-thumbnail" width="70px" alt="...">
                                    </td>
                                    <td>Home Appliance</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#exampleModal" data-whatever="1">
                                            Announcement
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="{{asset('image/sicon2.jpg')}}" class="mr-3 img-thumbnail" width="70px" alt="...">
                                    </td>
                                    <td>Mounting Installing</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#exampleModal" data-whatever="2">
                                            Announcement
                                        </button>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Announcement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{url('AddAnnouncement')}}">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" id="ModalUserId">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea class="form-control" name="description" id="message-text"></textarea>
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
                    Announcement
                </div>
                <div class="card-body p-0">
                    @foreach($spAnnouncement as $spAnnouncements)
                        <div class="media p-2">
                            <div class="dropdown ml-auto">
                                <button class="btn btn-secondary shadow-none" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-sliders-h"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{route('announcement')}}/{{$spAnnouncements->id}}"
                                       class="dropdown-item">Edit</a>
                                    <a href="{{url('DeleteAnnouncement?delete='.$spAnnouncements->id)}}"
                                       class="dropdown-item">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <h4>{{$spAnnouncements->title}}</h4>
                            <p>{{$spAnnouncements->description}}</p>
                        </div>

                        <hr class="bg-dark">
                    @endforeach
                </div>
            </div>


        </div>


    </div>






@endsection