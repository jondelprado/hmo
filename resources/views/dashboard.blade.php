@extends('layouts.app')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="http://localhost/hmo/public//dashboard">Dashboard</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="row">

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Companies</h5>
          </div>
          <div class="card-body">
            <div class="card-text">
              <p>Current Company Count:</p>
              <h3>16</h3>
              <a href="#" class="btn btn-primary">Check</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Accredited Hospitals</h5>
          </div>
          <div class="card-body">
            <div class="card-text">
              <p>Current Hospital Count:</p>
              <h3>16</h3>
              <a href="#" class="btn btn-primary">Check</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Members</h5>
          </div>
          <div class="card-body">
            <div class="card-text">
              <p>Current Member Count:</p>
              <h3>16</h3>
              <a href="#" class="btn btn-primary">Check</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
