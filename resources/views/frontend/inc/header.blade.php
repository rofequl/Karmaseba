<style>
    .navbar-nav li:hover > ul.dropdown-menu {
        display: block;
        transition: .6s;
    }

    .dropdown-submenu {
        position: relative;
        transition: .6s;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: -10rem;
        margin-top: -6px;
        transition: .6s;
    }
</style>


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light static-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="image/logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sp')}}">Become a Service provider</a>
                </li>
                <li class="nav-item">
                    @if(Session::has('language') && Session::get('language')=="Bangla")
                        <a class="nav-link" href="{{route('changeLang')."?language=English"}}">English</a>
                    @else
                        <a class="nav-link" href="{{route('changeLang')."?language=Bangla"}}">বাংলা</a>
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dhaka
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item textColor" href="#">Bangladesh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item textColor" href="#">Rajshahi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item textColor" href="#">Khulna</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item textColor" href="#">Barishal</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item textColor" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                    </a>

                    <ul class="dropdown-menu dropdownWidth dropdown-menu-right px-0"
                        aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        $serviceCategory = getserviceCategory();
                        $serviceSubcategory = getserviceSubcategory();
                        ?>
                        @foreach($serviceCategory as $serviceCategories)
                            <li class="dropdown-submenu mx-0"><a class="dropdown-item textColor" href="#">
                                    <img src="{{asset('storage/serviceCategory/'.$serviceCategories->image)}}"
                                         class="img-fluid" style="width:35px;">
                                    {{Session::get('language')=="Bangla" ? $serviceCategories->category_nameBn : $serviceCategories->category_name}}</a>
                                <ul class="dropdown-menu border-0 p-0">
                                    @foreach($serviceSubcategory as $serviceSubcategories)
                                        @if($serviceSubcategories->category_id == $serviceCategories->id)
                                            <li class="mx-0"><a class="dropdown-item textColor" href="#">
                                                    <img src="{{asset('storage/serviceCategory/'.$serviceSubcategories->image)}}"
                                                         class="img-fluid" style="width:35px;">
                                                    {{Session::get('language')=="Bangla" ? $serviceSubcategories->subcategory_nameBn : $serviceSubcategories->subcategory_name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>


                    {{--<div class="dropdown-menu dropdownWidth" aria-labelledby="navbarDropdown">--}}
                        {{--<a class="dropdown-item textColor" href="#">--}}
                            {{--<img src="{{asset('image/sicon1.jpg')}}" class="img-fluid" style="width:35px;">--}}
                            {{--Home Appliance</a>--}}
                        {{--<a class="dropdown-item textColor" href="#">--}}
                            {{--<img src="{{asset('image/sicon2.jpg')}}" class="img-fluid" style="width:35px;">--}}
                            {{--Mounting Installing</a>--}}

                        {{--<a class="dropdown-item textColor" href="#">--}}
                            {{--<img src="{{asset('image/sicon3.jpg')}}" class="img-fluid" style="width:35px;">--}}
                            {{--Shifting Pack</a>--}}

                        {{--<a class="dropdown-item textColor" href="#">--}}
                            {{--<img src="{{asset('image/sicon4.jpg')}}" class="img-fluid" style="width:35px;">--}}
                            {{--It-Gadget</a>--}}

                        {{--<a class="dropdown-item textColor" href="#">--}}
                            {{--<img src="{{asset('image/sicon5.jpg')}}" class="img-fluid" style="width:35px;">--}}
                            {{--Clint and Paste control</a>--}}
                    {{--</div>--}}

                </li>
                @if (Session::has('phone'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Log Out</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" href="#">Log In</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Sp Portal Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin text-center" action="{{ url('LoginCheck') }}" method="post">
                    {{ csrf_field() }}
                    <label for="loginNumber" class="sr-only">Email address</label>
                    <input type="number" name="phone" id="loginNumber" class="form-control mb-2"
                           placeholder="Phone Number">

                    <label for="loginPassword" class="sr-only">Email address</label>
                    <input type="password" name="password" id="loginPassword" class="form-control"
                           placeholder="Password">

                    <button class="btn btn-lg btn-primary btn-block my-2" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>