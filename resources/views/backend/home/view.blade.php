@extends('layouts.backend')
@section('content')

<!-- main content -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Basic DataTables</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>                                 
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Zip Code</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Secondary Phone Number</th>
                <th>Date of Birth</th>
                <th>Business</th>
                <th>Social Date</th>
              </tr>
            </thead>
            <tbody>                                 
              <tr>
                <td>{{ $info->firstName }}</td>
                <td>{{ $info->lastName }}</td>
                <td>{{ $info->phoneNumber }}</td>
                <td>{{ $info->zipCode }}</td>
                <td>{{ $info->address }}</td>
                <td>{{ $info->city }}</td>
                <td>{{ $info->province }}</td>
                <td>{{ $info->secondaryPhone }}</td>
                <td>{{ $info->dob }}</td>
                <td>{{ $info->business }}</td>
                <td>{{ $info->socialDate }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- main content end -->

@endsection