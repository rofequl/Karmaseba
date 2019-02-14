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
            @if(isset($categoryUpdate))
                <div class="card my-5 shadow">
                    <div class="card-header bg-light">
                        Update Service Catedory
                    </div>
                    <form method="post" action="{{route('admin.categoryUpdate')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$categoryUpdate->id}}">
                            <div class="form-row">
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" value="{{$categoryUpdate->category_name}}" id="staticEmail2" name="category_name"
                                           placeholder="Category Name">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" id="inputPassword2" value="{{$categoryUpdate->category_nameBn}}"
                                           name="category_nameBn"
                                           placeholder="Category Name Bangla">
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Image</label>
                                    </div>
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
                    All Service category
                    <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-sm btn-primary float-right shadow-none"> Add new category
                    </button>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered text-center" id="spNotApproveTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name Bangla</th>
                            <th scope="col">Landing page</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($category as $categorys)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td><img src="{{asset('storage/serviceCategory/'.$categorys->image)}}"
                                         class="img-thumbnail" width="70px" alt="..."></td>
                                <td>{{$categorys->category_name}}</td>
                                <td>{{$categorys->category_nameBn}}</td>
                                <td>
                                    @if($categorys->landing_view == 1)
                                        <a href="{{url('catViewUpdate?Hide=').$categorys->id}}"><span
                                                    class="badge badge-pill badge-primary">Show</span></a>
                                    @else
                                        <a href="{{url('catViewUpdate?Show=').$categorys->id}}"><span
                                                    class="badge badge-pill badge-secondary">Hide</span></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.category')}}/{{$categorys->id}}"
                                       class="btn btn-sm bg-success">Edit</a>
                                    <a href="{{url('DeleteSerCategory?delete='.$categorys->id)}}"
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
                        <form method="post" action="{{route('admin.categoryInsert')}}"
                              enctype="multipart/form-data">
                            <div class="modal-body">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="col-12 col-md-4">
                                        <input type="text" class="form-control" id="staticEmail2"
                                               name="category_name"
                                               placeholder="Category Name">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="text" class="form-control" id="inputPassword2"
                                               name="category_nameBn"
                                               placeholder="Category Name Bangla">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                   name="image">
                                            <label class="custom-file-label" for="customFile">Image</label>
                                        </div>
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