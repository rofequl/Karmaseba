<nav class="navbar navbar-expand-md px-md-3 fixed-top bg-white border-bottom shadow-sm">
    <div class="order-0 w-100">
        <a class="navbar-brand mx-auto" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('sp')}}">Home</a>
            </li>

            @if (Session::has('phone'))
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('logout')}}">Log Out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" href="#">Log In</a>
                </li>
            @endif
        </ul>
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
                    <input type="number" name="phone" id="loginNumber" class="form-control mb-2" placeholder="Phone Number">

                    <label for="loginPassword" class="sr-only">Email address</label>
                    <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Password">

                    <button class="btn btn-lg btn-primary btn-block my-2" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>