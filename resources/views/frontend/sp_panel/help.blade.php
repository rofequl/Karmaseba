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
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif


            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    All the help you wanted
                </div>
                <div class="card-body p-0">
                    @foreach($spHelp as $spHelps)
                        <div class="m-2">
                            <p class="float-right"
                               style="font-size: 13px;">{{$spHelps->updated_at->diffForHumans()}}
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