<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>
        @yield('title')
    </title>

    <!------------CSS-------------->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('main/css/style.css')}}"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<nav class="navbar navbar-expand-lg  navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('partner#index') }}">Merry meal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Services</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active text-white" aria-current="page" href="#">Terms</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
                <button type="button" class="btn text-black" style="background-color: #9de50d;">Donate now</button>
              </li>
            </ul>
      

            <div class="btn-group btn-outline-secondary">
                <button type="button" class="btn btn-blue dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- {{ (Auth::user()->partner->partner_organization) }} --}}
                    {{ Auth::user() -> name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('partner#update') }}"><button class="btn pt-0 pb-1 px-0 nav-link text-dark"> Update </button> </a></li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn pt-0 pb-1 px-0 nav-link text-dark" style="button:focus { outline: none; }" >  <i class="fas fa-sign-out-alt" ></i> Logout </button>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>


<!-- Content -->
<section class="py-4">
    <div class="container">
        @yield('content')
    </div>
</section>
<!-- End Content -->

<!-- FOOTER -->
<footer>
    <div class="footer2 bg-dark">
      <div class="container">
        <div class="row" >
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h5 id="foot3" class="text-white my-3 d-flex justify-content-center">&copy; Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved.</h5>
          </div>
        </div>
      </div>
    </div>
</footer>

</body>
</html>
