@section('title')
    Partner Update Meal
@endsection

@extends('Users.Partner.layouts.app')

@section('content')
<style type="text/css">
    #partner{
        max-width: 500px;
        padding: 20px;
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
        <li class="breadcrumb-item active" aria-current="page">Update Partner</li>
        </ol>
    </nav>

<!-- END breadcrumb -->

<!-- Start content -->

<div class="container">
    <div class="row">

    <div class="col col-sm-6" id="partner">
      <form action="" method="post">
          @csrf
        <div class="form-foating py-3">
            <h3 class="text-center"> Update Partner</h3>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Partner Name</label>
          <input type="text" class="form-control" required="true">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Partner Address</label>
          <textarea class="form-control" required="true" name="address"></textarea>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Partner Phone number</label>
          <input type="tel" class="form-control" maxlength="11" required="true">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Partnership timeline</label>
          <input type="text" class="form-control" required="true">
        </div>

          <button type="submit" class="btn btn-outline-primary" style="float: right;">Update
          </button>
      </form>
    </div>
</div>
</div>
<!-- End content -->

@endsection
