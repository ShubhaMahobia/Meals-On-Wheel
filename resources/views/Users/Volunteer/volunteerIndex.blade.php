@section('title')
    Volunteer Dashboard
@endsection

@extends('Users.Volunteer.layouts.app')

@section('content')
<!-- Start breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('volunteer#index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Volunteer Dashboard</li>
        </ol>
    </nav>

<!-- END breadcrumb -->

<div class="container">
    <div class="card mt-4 mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" >

            <thead>
              <tr>
                <th>No.</th>
                <th>member name</th>
                <th>member address</th>
                <th>partner name</th>
                <th>partner address</th>
                <th>Meal Name</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->member_name }}</td>
                        <td>{{ $item->member_address }}</td>
                        <td>{{ $item->partner_organizations }}</td>
                        <td>{{ $item->partner_address }}</td>
                        <td>{{ $item->meal_name }}</td>
                        <td>
                            <a href="{{ route('volunteer#volunteerDetails', $item->id) }}">
                                <button type="button" class="btn btn-outline-primary" >  Detail</button>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


@endsection
