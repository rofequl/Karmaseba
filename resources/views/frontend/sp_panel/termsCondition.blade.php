@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">
        <div class="container mt-3">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Terms and Conditions
                </div>
                <div class="card-body p-0">
                    @foreach($spTermsCondition as $spTermsConditions)
                        <div class="m-2">
                            <p class="float-right" style="font-size: 13px;">{{$spTermsConditions->updated_at->diffForHumans()}}</p>
                            <h4>{{$spTermsConditions->title}}</h4>

                            <p>{{$spTermsConditions->message}}</p>
                        </div>

                        <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection