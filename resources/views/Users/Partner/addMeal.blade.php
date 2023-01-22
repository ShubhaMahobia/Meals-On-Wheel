@section('title')
    Partner Create Meal
@endsection

@extends('Users.Partner.layouts.app')

@section('content')
<style type="text/css">
    #createm{
        max-width: 500px;
        padding: 20px;
        height: auto;
        margin: 50px auto;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.1);
    }
</style>

<!-- Start breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('partner#index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('partner#index') }}">Partner Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create menu</li>
        </ol>
    </nav>

<!-- END breadcrumb -->

<!-- Start content -->
<div class="container">
    <div class="row">
      <div class="col col-sm-6" id="createm">
          <form action="{{ route('partner#createMeal') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-foating py-3">
                <h3 class="text-center"> Create Menu</h3>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name" name="meal_name">
              <label for="name">Meal Name</label>

                {{-- Validation  --}}
                @if ($errors->has('meal_name'))
                    <p class="text-danger">
                        {{ $errors->first('meal_name') }}
                    </p>
                @endif
                {{-- end of validation  --}}

            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name" name="meal_type">
              <label for="name">Meal Type</label>

              {{-- Validation  --}}
                @if ($errors->has('meal_type'))
                    <p class="text-danger">
                        {{ $errors->first('meal_type') }}
                    </p>
                @endif
                {{-- end of validation  --}}

            </div>

            <div class="form-floating mb-3">
              <input type="file" class="form-control" id="floatingInput" placeholder="name" name="meal_image">
              <label for="formFile">Meal Image</label>

                {{-- Validation  --}}
                @if ($errors->has('meal_image'))
                    <p class="text-danger">
                        {{ $errors->first('meal_image') }}
                    </p>
                @endif
                {{-- end of validation  --}}
            </div>

            <div class="form-floating mb-3">
                <select name="partner" class="form-control">
                    <option value="">Choose Organization Name</option>
                    @foreach ($partnerData as $partner)
                        <option value="{{ $partner->id }}">{{ $partner->partner_organization }}</option>
                    @endforeach
                </select>
            </div>
            <script>
                var variable1 = document.getElementById("demo1");
                function getlocation() {
                  navigator.geolocation.getCurrentPosition(showLoc);
                }
                function showLoc(pos) {
              
                var lat=pos.coords.latitude;
                var log=pos.coords.longitude;

                document.getElementById("latitude").value = lat;
                document.getElementById("longitude").value = log;
              
                  variable1.innerHTML =
                    "Latitude: " +
                    pos.coords.latitude +
                    "<br>Longitude: " +
                    pos.coords.longitude;
                }
              </script>
              <label for="cgphone" class="col-sm-4 col-form-label">Partner Address</label>
              <input type="button" value="Grant_Location" onclick="getlocation()"/><br/>
              <div class="row mb-3">
                <label for="cgphone" class="col-sm-4 col-form-label">Longitude</label>
                  <div class="col-sm-8">
                    <input id="longitude" type="tel" class="form-control" maxlength="11" name="meal_partner_longitude" >
                  </div>
              </div>
              <div class="row mb-3">
                <label for="cgphone" class="col-sm-4 col-form-label">Latitude</label>
                  <div class="col-sm-8">
                    <input id ="latitude" type="tel" class="form-control" maxlength="11" name="meal_partner_latitude" >
                  </div>
              </div>
            
            

            <div class="form-floating mb-3">
                <select name="user" class="form-control">
                    <option value="">Choose Address</option>
                    @foreach ($userData as $user)
                            @if ($user->role == 'partner')
                            @foreach ($partnerData as $partner)
                                <option value="{{ $user->id }}">{{ $user->address }}</option>
                            @endforeach
                                
                            @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-primary" style="float: right;">Create
            </button>
            <button type="reset" class="btn btn-outline-danger" style="float: right;margin-right: 20px;">Clear</button>

        </form>

      </div>
    </div>
  </div>

<!-- End content-->
@endsection
