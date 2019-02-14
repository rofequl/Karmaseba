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
            @if(isset($category4Update))
                <div class="card my-5 shadow">
                    <div class="card-header bg-light">
                        Update Service Catedory
                    </div>
                    <form method="post" action="{{route('admin.category4Update')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$category4Update->id}}">
                            <div class="form-row">
                                <div class="col-12 col-md">
                                    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                        @foreach($category as $categorys)
                                            @if($categorys->id == $category4Update->category_id)
                                                <option value="{{$categorys->id}}"
                                                        selected>{{$categorys->category_name}}</option>
                                            @else
                                                <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md">
                                    <select class="form-control" name="subcategory_id" id="exampleFormControlSelect1">
                                        @foreach($subcategory as $subcategorys)
                                            @if($subcategorys->id == $category4Update->subcategory_id)
                                                <option value="{{$subcategorys->id}}"
                                                        selected>{{$subcategorys->subcategory_name}}</option>
                                            @else
                                                <option value="{{$subcategorys->id}}">{{$subcategorys->subcategory_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md">
                                    <select class="form-control" name="category3_id"
                                            id="exampleFormControlSelect1">
                                        @foreach($category3 as $category3s)
                                            @if($category3s->id == $category4Update->category3_id)
                                                <option value="{{$category3s->id}}"
                                                        selected>{{$category3s->category3_name}}</option>
                                            @else
                                                <option value="{{$category3s->id}}">{{$category3s->category3_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md">
                                    <input type="text" class="form-control" id="staticEmail2"
                                           name="category4_name" value="{{$category4Update->category4_name}}"
                                           placeholder="Category Name">
                                </div>
                                <div class="col-12 col-md">
                                    <input type="text" class="form-control" id="inputPassword2"
                                           name="category4_nameBn" value="{{$category4Update->category4_nameBn}}"
                                           placeholder="Category Name Bangla">
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
                    All Service Category layer 4
                    <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-sm btn-primary float-right shadow-none"> Add new Category4
                    </button>
                </div>
                <div class="card-body p-2">
                    <table class="table table-striped table-bordered text-center" id="spNotApproveTable">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Subcategory Name</th>
                            <th scope="col">Category3 Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name Bangla</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($category4 as $category4s)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td><?php echo getIdByName($category4s->category_id, "service_categories", "id", "category_name");?></td>
                                <td><?php echo getIdByName($category4s->subcategory_id, "service_subcategories", "id", "subcategory_name");?></td>
                                <td><?php echo getIdByName($category4s->category3_id, "service_3categories", "id", "category3_name");?></td>
                                <td>{{$category4s->category4_name}}</td>
                                <td>{{$category4s->category4_nameBn}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.category4')}}/{{$category4s->id}}"
                                       class="btn btn-sm bg-success">Edit</a>
                                    <a href="{{url('DeleteSerCategory4?delete='.$category4s->id)}}"
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
                        <form method="post" action="{{route('admin.category4Insert')}}"
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
                                        <select class="form-control" name="subcategory_id"
                                                id="exampleFormControlSelect1">
                                            @foreach($subcategory as $subcategorys)
                                                <option value="{{$subcategorys->id}}">{{$subcategorys->subcategory_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <select class="form-control" name="category3_id"
                                                id="exampleFormControlSelect1">
                                            @foreach($category3 as $category3s)
                                                <option value="{{$category3s->id}}">{{$category3s->category3_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" class="form-control" id="staticEmail2"
                                               name="category4_name"
                                               placeholder="Category Name">
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" class="form-control" id="inputPassword2"
                                               name="category4_nameBn"
                                               placeholder="Category Name Bangla">
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