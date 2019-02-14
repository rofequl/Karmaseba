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
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Add New Existing Resource
            </div>
            <div class="card-body p-2">
                <form method="post" action="{{url('AddDeleteResource')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">National Id Number:</label>
                        <input type="number" name="nationalId_Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter National Id Number">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>

</div>

@endsection