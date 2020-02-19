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
                  <th>Date Filed</th>
                  <th>Doctor</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th></th>
                </tr>
              </thead>
            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection








{{--  --}}
