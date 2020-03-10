@extends('layouts.coordinator')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Doctor</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Claims</li>
            <li class="breadcrumb-item active">Doctor</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="card-title">
              <a href="http://localhost/hmo/public/claims/doctor/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-hover coordinator_table">
              <thead>
                <tr>
                  <th>Claim ID</th>
                  <th>Doctor</th>
                  <th>Date Filed</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $status = "";
                  $status_color = "";
                @endphp
                @foreach ($claims as $claim)
                  @php
                    if ($claim->status == "1") {
                      $status = "Pending";
                      $status_color = "orange";
                    }
                    elseif ($claim->status == "2") {
                      $status = "Approved";
                      $status_color = "lightgreen";
                    }
                    else {
                      $status = "Denied";
                      $status_color = "red";
                    }
                  @endphp
                  <tr>
                    <td>{{$claim->claim_id}}</td>
                    <td>{{strtoupper($claim->lastname.', '.$claim->firstname.' '.$claim->middlename)}}</td>
                    <td>{{date('M j, Y \a\t g:i A', strtotime($claim->created_at))}}</td>
                    <td style="color: {{$status_color}}">{{$status}}</td>
                    <td>
                      <a href="http://localhost/hmo/public/claims/doctor/{{$claim->id}}/view" class="btn btn-info">View</a>
                      <a href="http://localhost/hmo/public/claims/doctor/{{$claim->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" data-toggle="modal" data-target="#delete_claim_{{$claim->id}}" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection








{{--  --}}
