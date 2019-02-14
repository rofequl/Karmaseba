@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">
        <div class="container mt-3">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Announcement
                </div>
                <div class="card-body p-0">
                    @foreach($spAnnouncement as $spAnnouncements)
                        <div class="m-2">
                            <p class="float-right" style="font-size: 13px;">{{$spAnnouncements->updated_at->diffForHumans()}}</p>
                            <h4>{{$spAnnouncements->title}}</h4>

                            <p>{{$spAnnouncements->description}}</p>
                        </div>

                        <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection