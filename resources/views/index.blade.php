<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{url('assets/css/donate.css')}}">
    
  </head>
<body style ="background-image: url(https://img.freepik.com/free-vector/charity-doodle-vector-background-donation-concept_53876-143434.jpg?w=740&t=st=1671192313~exp=1671192913~hmac=62756859ec2d1affde75dc90f641019bfa953d1f4911d674ca3811bf7645be4f);background-size: cover;background-repeat: no-repeat">
  <!-- Option 1: Bootstrap Bundle with Popper -->


<!-- Start nav -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top "style="background-color:#212529;">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('main') }}">Meels On Wheels</a>&nbsp;&nbsp;&nbsp;
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Terms</a>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item">
         <a style="text-decoration: none" href="/donate"> <button type="button" class="btn text-black" style="background-color: #9de50d;">Donate now</button></a>
        </li>
      </ul>


        @if (Route::has('login'))
            <ul class="navbar-nav ml-auto navbar-dark">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-medium btn-black text-white btn-radius">Log in</a>&nbsp;&nbsp;

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-medium btn-black text-white btn-radius">Register</a>
                    @endif
                @endauth
            </ul>
        @endif

    </div>
  </div>
</nav>
<div style="margin-top: 15%"  class="container col-3 mx-auto pt-5">
<div class="box">
    
<h3 align="justify" class="">Give generously today to help those in need.</h3>

        <form method="post" action="/payment">
          @csrf
            <div class="form-group">
              <input  type="text" name="name" class="form-control" placeholder="Enter your name" required="required">
                 </div>
            <div class="form-group">
              <input type="number" name="amount" class="form-control" placeholder="₹500" required="required" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Proceed</button>
          </form>
        </div>
    
  </div>
    @if(Session::has('data'))
 
    <div class="container tex-center mx-auto">
    <form action="/pay" method="POST" class="text-center mx-auto mt-5">
      <script
          src="https://checkout.razorpay.com/v1/checkout.js"
          data-key="rzp_test_27dLDb1K3q2fPL"
    data-amount="{{Session::get('data.amount')}}" 
          data-currency="INR"
    data-order_id="{{Session::get('data.order_id')}}"
          data-buttontext="Proceed to Payment"
          data-name="Meals-On-Wheels"
          data-description="Test transaction"
         
          data-theme.color="#F37254"
      ></script>
      <input class="btn btn-primary" type="hidden" custom="Hidden Element" name="hidden">
      </form>
    </div>
    
    @endif
</body>
</html>