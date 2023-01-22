@section('title')
    Volunteer Dashboard
@endsection

@extends('Users.Volunteer.layouts.app')

@section('content')
<style type="text/css">
    #volunteer{
            max-width: 600px;
            padding: 20px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,0.1);
    }
</style>

<!-- Start breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('volunteer#index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('volunteer#index') }}">Volunteer Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Volunteer Details Page</li>
        </ol>
    </nav>

<!-- END breadcrumb -->

<!-- Start content -->
<div class="container">
    <div class="row">

      <div class="col col-sm-12" id="volunteer">
            <form  action="{{ route('volunteer#volunteerMember') }}" method="POST" class="row g-3">
                @csrf
              <div class="col-md-6">
                <label for="name" class="form-label">Meal Name</label>
                <input type="text" class="form-control" name="meal_name" value="{{ old('meal_name', $meal->meal_name) }}">
              </div>

              <div class="col-md-6">
                <label for="name" class="form-label">Meal Type</label>
                <input type="text" class="form-control" name="meal_type" value="{{ old('meal_type', $meal->meal_type) }}">
              </div>

               <div class="col-md-6">
                <label for="name" class="form-label">Member Name</label>
                <input type="text" class="form-control" name="member_name" value="{{ old('member_name', $meal->member_name) }}">
              </div>

              <div class="col-md-6">
                <label for="name" class="form-label">Partner Name</label>
                <input type="text" class="form-control" name="partner_organizations" value="{{ old('partner_organizations', $meal->partner_organizations) }}">
              </div>

              <div class="col-md-6">
                <label for="name" class="form-label">Member Address</label>
                <input class="form-control" name="member_address" value="{{ old('member_address', $meal->member_address) }}">
              </div>

              <div class="col-md-6">
                <label for="name" class="form-label">Partner Address</label>
                <input class="form-control" name="partner_address" value="{{ old('partner_address', $meal->partner_address) }}">
              </div>

              <div class="col-md-12">
                <label for="name" class="form-label">Type of Meal</label>
                <input type="text" class="form-control" name="type_of_meal" value="{{ old('type_of_meal', $meal->type_of_meal) }}">
              </div>

              <div class="col-md-12">
                <label for="name" class="form-label">Volunteer Name</label>
                <input type="text" class="form-control" name="volunteer_name" value="{{ Auth()->user()->name }}">
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-outline-primary">choose member</button>
              </div>
        </form>

      </div>
    </div>
</div>
<!-- End content -->


@endsection
