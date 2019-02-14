@extends('frontend.layout.app')
@section('content')

    <style>
        .pointer4 {
            background-color: #4a90e2 !important;
        }

        .pointer4:after {
            right: -11px !important;
            border-left: 11px solid #4a90e2 !important;
            border-top: 27px solid transparent !important;
            border-bottom: 25px solid transparent !important;
        }
    </style>


    <section class="bg-light pt-5" id="getInfo">
        <p class="text-center"> দ্রুত কাজ পেতে নিচের তথ্যগুলো প্রদান করুন। </p>

        <div id="topNavigator" class="mt-4 pl-5 w-100">
            <ul class="justify-content-center">
                <li class="pointer pointer1"><a href="{{route('getInfo1')}}" class="">ব্যক্তিগত তথ্য
                    </a></li>
                <li class="pointer pointer2"><a href="{{route('getInfo2')}}" class="">অপারেশান সংক্রান্ত তথ্য
                    </a></li>
                <li class="pointer pointer3"><a href="{{route('getInfo3')}}" class="">বিজনেস প্ল্যান
                        <span class="done-tick"></span></a></li>
                <li class="pointer pointer4"><a href="{{route('getInfo4')}}" class="text-white">অ্যাড সার্ভিস
                    </a></li>
                <li class="pointer pointer5"><a href="{{route('getInfo5')}}" class="">অ্যাড রিসোর্স
                    </a></li>
            </ul>
        </div>

        <div class="container bg-white py-3">
            <div class="w-100">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <h4 class="font-weight-normal text-center my-5">  Add your Service  </h4>
            <div class="row justify-content-center">
                <form role="form" action="{{ url('updateGetInfo4') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Resource Category</label>
                        <select name="category_id" class="custom-select" id="select_id" required>
                            <option value="">Select Category</option>
                                <option value="1">Appliance Repair</option>
                                <option value="2">Shifting</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Resource Sub category</label>
                        <select name="subcategory_id" id="selectList" class="custom-select" required>
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-success">Add Service</button>
                </form>
            </div>
        </div>
    </section>

    <script>

    </script>

@endsection