@section('title')
    Member Dashboard
@endsection

@extends('Users.Member.layouts.app')

@section('content')
<!-- Start breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Member Dashboard</li>
        </ol>
    </nav>

<!-- END breadcrumb -->



<!-- Start content -->

        <div class="card  mb-4">
            <div class="card-body">
            <div class="table-responsive">
                <div class="mb-4">
                    {{-- Adding Categroy Session Checking  --}}
                    @if (Session::has('mealCreated'))
                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('mealCreated') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- End of Session Checking --}}

                    {{-- Updating Categroy Session Checking  --}}
                    @if (Session::has('updateData'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('updateData') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- End of Session Checking --}}

                    {{-- Deleting Categroy Session Checking  --}}
                    @if (Session::has('mealDeleted'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('mealDeleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- End of Session Checking --}}
                </div>
                <div class="container" ">
                    <div class="menu" >
                    <!-- <div class="menu" style="display: flex;"> -->
                      <h2 class="menu-group-heading">
                        Menu
                      </h2>
                      <div class="con">
                      @foreach ($mealData as $meal)
                      
                      <div class="menu-group">
                        <div class="menu-item">
                          <img class="menu-item-image" src="{{ asset('uploads/meal/' . $meal->meal_image) }}" alt="Meal">
                          <div class="menu-item-text">
                            <h3 class="menu-item-heading">
                              <span class="menu-item-name">{{ $meal->meal_name }}</span>
                              <!-- <span class="menu-item-price">{{ $meal->meal_type }}</span> -->
                            </h3>
                            <p class="menu-item-description">
                            {{ $meal->meal_type }}
                            </p>
                            <p class="menu-item-description">
                            This meal is verified and has all the nutritions required by an adult.
                            </p>
                            <a href="{{ route('member#orderMeal', $meal->id) }}" style="text-decoration: none; margin:0px 0px 4px 300px;">
                            <button type="button" class="btn btn-outline-primary" id="edit" style="margin-bottom: 16px;">
                                <i class="fa fa-cutlery" style="padding: 2px 8px ;"></i>Order Meal</button>
                            </a>
                          </div>
                          
                        </div>
                      </div>
                      
                      @endforeach
                      </div>
                    </div>
                  </div>
                                {{-- {!! $mealData->links() !!} --}}
                            </div>
                            </div>
                        </div>
                    </div>
                    
                
                  <link rel="preconnect" href="https://fonts.gstatic.com">
                  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
                
                
                
                @endsection

                <style>
                    a{
                        text-decoration: none;
                    }
                    .container {
                      max-width: 1200px;
                      margin: 0 auto;
                      
                    }
                    .menu {
                      font-family: "Inter", sans-serif;
                      font-size: 14px;
                      
                    }
                    .menu-group-heading {
                      margin: 0;
                      padding-bottom: 1em;
                      border-bottom: 2px solid #ccc;
                      
                    }
                    .con{
                      /* display: flex; */
                      justify-content: space-between;
                      align-items: center;
                    
                    }
                    .menu-group {
                      /* display: grid; */
                      grid-template-columns: 1fr;
                      gap: 1.5em;
                      padding-top: 1.5em;
                      column-count: 2;
                    }
                    .menu-item {
                      display: flex;
                    }
                    .menu-item-image {
                      width: 80px;
                      height: 80px;
                      flex-shrink: 0;
                      object-fit: cover;
                      margin-right: 1.5em;
                    }
                    
                    .menu-item-text {
                      flex-grow: 1;
                    }
                    
                    .menu-item-heading {
                      display: flex;
                      justify-content: space-between;
                      margin: 0;
                    }
                    
                    .menu-item-name {
                      margin-right: 1.5em;
                    }
                    
                    .menu-item-description {
                      line-height: 1.6;
                    }
                    
                    @media screen and (min-width: 992px) {
                      .menu {
                        font-size: 16px;
                      }
                    
                      .menu-group {
                        grid-template-columns: repeat(2, 1fr);
                      }
                    
                      .menu-item-image {
                        width: 125px;
                        height: 125px;
                      }
                    }
                    
                    button {
                      width: 140px;
                      height: 45px;
                      font-family: 'Roboto', sans-serif;
                      font-size: 11px;
                      text-transform: uppercase;
                      /* letter-spacing: 2.5px; */
                      font-weight: 500;
                      color: #000;
                      background-color: #fff;
                      border: none;
                      border-radius: 45px;
                      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                      transition: all 0.3s ease 0s;
                      cursor: pointer;
                      outline: none;
                      }
                    
                    .btn-outline-success:hover {
                      background-color: #2EE59D;
                      box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
                      color: #fff;
                      transform: translateY(-7px);
                    }
                    .btn-outline-primary:hover{
                      background-color: #2EE59D;
                      box-shadow: 0px 15px 20px rgba(45, 165, 226, 0.4);
                      color: #fff;
                      transform: translateY(-7px);
                    }
                    .btn-outline-danger:hover{
                      background-color: #2EE59D;
                      box-shadow: 0px 15px 20px rgba(224, 4, 48, 0.4);
                      color: #fff;
                      transform: translateY(-7px);
                    }
                    .btn{
                      transition: all 0.3s ease 0s !important;
                    }

                    .btn-outline-primary{
                        margin-top: 40px;
                    }
                    .footer{
                        position: fixed;
                        left: 0;
                        bottom: 0;
                        width: 100%;
                        text-align: center;
                    }
                    </style>

 