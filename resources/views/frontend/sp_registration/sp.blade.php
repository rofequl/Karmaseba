@extends('frontend.layout.app')

@section('content')

<section class="bg-light mb-5 py-4" id="section1">
    <div class="container">
        @if(session()->has('login_error'))
            <div style="height: 50px; width: 100%; color: #FFF; background-color: rgba(255,0,0,.6); line-height:50px; text-align: center">
                {{ session()->get('login_error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-5 mx-auto">
                <h2>ব্যবসা বাড়াতে <br>
                    যোগ দিন সেবাতে</h2>
                <h6 class="mb-4">দেশের বৃহত্তম সার্ভিস প্লাটফর্ম এ যোগ দিন আর কাজ শুরু করুন ।</h6>
                @if ($errors->has('phone'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <div class="w-100">
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
                <form class="form-signin" method="post" action="{{url('spUserRegister')}}" id="userRegister">
                    {{ csrf_field() }}
                    <label for="inputPhoneNumber" class="sr-only">Phone number</label>
                    <span id="inputPhoneNumberAlert" style="visibility: hidden;"></span>
                    <input type="number" onkeyup="inputNumber()" name="phone" id="inputPhoneNumber" class="form-control text-center mb-2" placeholder="ফোন নাম্বার">

                    <div style="display: none;" id="passDisplayBlock">
                        <label for="inputPassword" class="sr-only">password</label>
                        <span id="inputPasswordAlert" style="visibility: hidden;"></span>
                        <input type="password" id="inputPassword" name="password" class="form-control text-center" placeholder="Password">
                    </div>

                    <div class="checkbox mb-1 mt-3">
                        <label>
                            <input type="checkbox" id="checkboxTerms" value="remember-me"> I agree to terms & condition
                        </label>
                    </div>
                    <button class="btn btn-lg btn-success btn-block" type="submit"> ফ্রি রেজিস্ট্রেশন করুন</button>
                </form>
            </div>
            <div class="col-5 mx-auto">
                <img src="{{asset('image/sp/pic1.jpg')}}" alt="header" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="my-4" id="section2">
    <div class="container text-center">
        <div class="row my-4">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">কেন সেবাতে যোগ দেবেন</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h5>ব্যবসাকে বাড়িয়ে তুলুন</h5>
                <p>প্রতিদিন নতুন কাস্টমার পান আর কর্ম দক্ষতার প্রমাণ দিন</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h5>স্বাধীন ভাবে কাজ করুন</h5>
                <p>জের সুবিধা মত সময়ে সার্ভিস প্রদান করুন দেশের যেকোন প্রান্ত থেকে</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h5>ব্যবসা বাস্তবায়ন</h5>
                <p>খুব সহজেই পাচ্ছেন লেনদেনের হিসাব, কর্মী তত্ত্বাবধায়ন সহ আরো অনেক কিছু</p>
            </div>
            <div class="col-lg-3">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h5>সার্বক্ষণিক যোগাযোগ ব্যবস্থা</h5>
                <p>যেকোন জিজ্ঞাসা বা সহয়তার জন্য</p>
            </div>
        </div>
    </div>
</section>

<section class="my-5" id="section3">
    <div class="container p-5 bg-success text-white">
        <div class="row">
            <div class="col-lg-4">
                <i class="far fa-user fa-5x float-left"></i>
                <p class="m-3 mx-5 fa-1x">141776 + <br>
                    সার্বক্ষণিক যোগাযোগ ব্যবস্থা</p>
            </div>
            <div class="col-lg-4">
                <i class="far fa-user fa-5x float-left"></i>
                <p class="m-3 mx-5 fa-1x">141776 + <br>
                    সার্বক্ষণিক যোগাযোগ ব্যবস্থা</p>
            </div>
            <div class="col-lg-4">
                <i class="far fa-user fa-5x float-left"></i>
                <p class="m-3 mx-5 fa-1x">141776 + <br>
                    সার্বক্ষণিক যোগাযোগ ব্যবস্থা</p>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <img src="{{asset('image/sp/pic2.jpg')}}" class="img-fluid w-100">
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>ব্যবসা বাড়াতে যোগ দিন সেবাতে</h3>
                <div class="w-100 shadow my-4 p-5 border"> Ok Done</div>
                <div class="w-100 shadow-sm my-4 p-5 border"> Ok Done</div>
                <div class="w-100 shadow-sm my-4 p-5 border"> Ok Done</div>
            </div>
            <div class="col-4 mx-auto">
                <img src="{{asset('image/sp/pic3.png')}}" class="img-fluid w-75">
            </div>
        </div>
    </div>
</section>

<section class="my-5 bg-light">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Pricing</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap
            example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0
                        <small class="text-muted">/ mo</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 users included</li>
                        <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-success">Sign up for free</button>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$15
                        <small class="text-muted">/ mo</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>20 users included</li>
                        <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-success">Get started</button>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$29
                        <small class="text-muted">/ mo</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-success">Contact us</button>
                </div>
            </div>
        </div>
</section>

<section class="my-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
                    vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
                    cursus magna.</p>
            </div>
            <div class="col-lg-4">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h2>Heading</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                    mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                    condimentum nibh.</p>
            </div>
            <div class="col-lg-4">
                <img class="rounded-circle"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                     alt="Generic placeholder image" width="140" height="140">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                    porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh,
                    ut fermentum massa justo sit amet risus.</p>
            </div>
        </div>
    </div>
</section>

<section class="my-5 p-5 bg-success">

</section>

<section class="my-5">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">কেন সেবাতে তে যোগ দেবেন</h2>
            </div>
        </div>
        <div class="accordion w-50 mx-auto" id="accordionExample">
            <div class="card">
                <div class="border-bottom p-3 dropdown-toggle" id="headingOne" data-toggle="collapse"
                     data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Button
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="border-bottom p-3 dropdown-toggle" id="headingTwo" data-toggle="collapse"
                     data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ggg
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree"
                     aria-expanded="false" aria-controls="collapseThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button">
                            Collapsible Group Item
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="my-5 py-3 bg-light">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">কেন সেবাতে তে যোগ দেবেন</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 bg-white">
                <div class="row p-3">
                    <div class="col-lg-6 border-right">
                        <div class="contact-contact">
                            <h2 class="mb-30">GET IN TOUCH</h2>
                            <ul class="contact-details">
                                <li><span>221B Baker Streer</span></li>
                                <li><span>New York, London</span></li>
                                <li><span>+88 65783657863</span></li>
                                <li><span>abcmn@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection