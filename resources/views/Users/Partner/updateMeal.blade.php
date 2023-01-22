@section('title')
    Partner Update Meal
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
        <li class="breadcrumb-item active" aria-current="page">Update Menu</li>
        </ol>
    </nav>

<!-- END breadcrumb -->

<!-- Start content -->
<div class="container">
    <div class="row">

        <div class="col col-sm-6" id="createm">
            <form action="{{ route('partner#updateMeal', $editMeal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-foating py-3">
                    <h3 class="text-center"> Update Menu</h3>
                </div>
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" name="meal_name" value="{{ old('meal_name', $editMeal->meal_name) }}">
                <label for="name">Meal Name</label>
                </div>

                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" name="meal_type" value="{{ old('meal_type', $editMeal->meal_type) }}">
                <label for="name">Meal Type</label>
                </div>

                <div class="form-floating mb-3 text-center">
                    @if ($editMeal->meal_image)
                        <img src="{{ asset('uploads/meal/'. $editMeal->meal_image) }}" class="img-thumbnail" width="150px" height="150px" alt="category image ">
                        <br>
                    @endif
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" placeholder="name" name="meal_image" value="{{ $editMeal->meal_image }}">
                    <label for="formFile">Meal Image</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="partner" class="form-control">
                        <option value="">Choose Organization Name</option>
                        @foreach ($partnerData as $partner)
                            <option value="{{ $partner->id }}">{{ $partner->partnership_organization }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-floating mb-3">
                    <select name="user" class="form-control">
                        <option value="">Choose Address</option>
                        @foreach ($userData as $user)
                            <option value="{{ $user->id }}">
                                @if ($user->role == 'partner')
                                    {{ $user->address }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-primary" style="float: right;">Update
                </button>

            </form>

      </div>
    </div>
  </div>

<!-- End content-->
@endsection
