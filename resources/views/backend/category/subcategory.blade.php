@extends('backend.layout.app')
@section('content')

    <style>
        .modal {
            z-index: 1100 !important;
        }
    </style>
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
            @if(isset($subcategoryUpdate))
                <div class="card my-5 shadow">
                    <div class="card-header bg-light">
                        Update Service Catedory
                    </div>
                    <form method="post" action="{{route('admin.subcategoryUpdate')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$subcategoryUpdate->id}}">
                            <div class="form-row">
                                <div class="col-12 col-md">
                                    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                        @foreach($category as $categorys)
                                            @if($categorys->id == $subcategoryUpdate->category_id)
                                                <option value="{{$categorys->id}}" selected>{{$categorys->category_name}}</option>
                                            @else
                                                <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md">
                                    <select class="form-control" name="service_id" id="exampleFormControlSelect1">
                                        @foreach($servicePanel as $servicePanels)
                                            @if($servicePanels->id == $subcategoryUpdate->category_id)
                                            <option value="{{$servicePanels->id}}" selected>{{$servicePanels->service_name}}</option>
                                            @else
                                                <option value="{{$servicePanels->id}}">{{$servicePanels->service_name}}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md">
                                    <input type="text" class="form-control" id="staticEmail2"
                                           name="subcategory_name" value="{{$subcategoryUpdate->subcategory_name}}"
                                           placeholder="Category Name">
                                </div>
                                <div class="col-12 col-md">
                                    <input type="text" class="form-control" id="inputPassword2"
                                           name="subcategory_nameBn" value="{{$subcategoryUpdate->subcategory_nameBn}}"
                                           placeholder="Category Name Bangla">
                                </div>
                                <div class="col-12 col-md">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"
                                               name="image">
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
                    All Service Subcategory
                    <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-sm btn-primary float-right shadow-none"> Add new subcategory
                    </button>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered text-center" id="spNotApproveTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name Bangla</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($subcategory as $subcategorys)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td><?php echo getIdByName($subcategorys->category_id, "service_categories", "id", "category_name");?></td>
                                <td><?php echo getIdByName($subcategorys->service_id, "service_panels", "id", "service_name");?></td>
                                <td><img src="{{asset('storage/serviceCategory/'.$subcategorys->image)}}"
                                         class="img-thumbnail" width="70px" alt="..."></td>
                                <td>{{$subcategorys->subcategory_name}}</td>
                                <td>{{$subcategorys->subcategory_nameBn}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.subcategory')}}/{{$subcategorys->id}}"
                                       class="btn btn-sm bg-success">Edit</a>
                                    <a href="{{url('DeleteSerSubCategory?delete='.$subcategorys->id)}}"
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
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{route('admin.subcategoryInsert')}}"
                              enctype="multipart/form-data">
                            <div class="modal-body">
                                {{csrf_field()}}
                                <div class="form-row">
                                    <div class="col-12 col-md">
                                        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                            @foreach($category as $categorys)
                                                <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <select class="form-control" name="service_id" id="exampleFormControlSelect1">
                                            @foreach($servicePanel as $servicePanels)
                                                <option value="{{$servicePanels->id}}">{{$servicePanels->service_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" class="form-control" id="staticEmail2"
                                               name="subcategory_name"
                                               placeholder="Category Name">
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" class="form-control" id="inputPassword2"
                                               name="subcategory_nameBn"
                                               placeholder="Category Name Bangla">
                                    </div>
                                    <div class="col-12 col-md">
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