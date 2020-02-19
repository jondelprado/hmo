@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Coordinator</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Utilities</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/utilities/coordinator">Coordinator</a>
            </li>
            <li class="breadcrumb-item active">View</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="col-lg-12 text-center">
                      <img class="profile-user-img img-fluid img-square" src="{{asset('img/download.png')}}" alt="User profile picture"><br>
                      <hr><br>
                      @php
                        $fullname = $coordinator->lastname.", ".$coordinator->firstname." ".$coordinator->middlename;
                      @endphp
                      <h4>{{strtoupper($fullname)}}</h4><br><hr>
                      <h3>{{$coordinator->employee_id}}</h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="card">
                  <div class="card-header bg-info">
                    <h5>Information</h5>
                  </div>

                  <div class="card-body">
                    <div class="row">

                      <div class="col-lg-6">

                        <div class="row">

                          <div class="col-lg-6">
                            <label>First Name:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{strtoupper($coordinator->firstname)}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Last Name:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{strtoupper($coordinator->lastname)}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Middle Name:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{strtoupper($coordinator->middlename)}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Birthdate:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{date('M j, Y', strtotime($coordinator->bday))}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Age:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{$coordinator->age}}</p>
                          </div>

                        </div>

                      </div>

                      <div class="col-lg-6">

                        <div class="row">

                          <div class="col-lg-6">
                            <label>Gender:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{strtoupper($coordinator->gender)}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Telephone:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{$coordinator->telephone}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Mobile:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{$coordinator->mobile}}</p>
                          </div>

                          <div class="col-lg-6">
                            <label>Email:</label>
                          </div>
                          <div class="col-lg-6">
                            <p>{{$coordinator->email}}</p>
                          </div>

                        </div>

                      </div>

                      <div class="col-lg-12">
                        <hr>
                        <div class="row">

                          <div class="col-lg-3">
                            <label>Address:</label>
                          </div>

                          <div class="col-lg-9">
                            <p>{{strtoupper($coordinator->address)}}</p>
                          </div>

                        </div>

                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>

          <div class="card-footer text-center">
            <a href="http://localhost/hmo/public/utilities/coordinator" class="btn btn-danger">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection









{{--  --}}
