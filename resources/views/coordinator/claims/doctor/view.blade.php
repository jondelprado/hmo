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
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/claims/doctor/">Doctor</a>
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

                  <div class="card-header bg-info">
                    <h5>Information</h5>
                  </div>

                  <div style="height: 650px; overflow-y: auto;" class="card-body">

                    <div class="row">

                      <div class="col-lg-12 text-center">
                        <u><h4>{{strtoupper($doctor->claim_id)}}</h4></u>
                        <small>Claim ID</small>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">

                          <div class="col-lg-12"><hr></div>

                          <div class="col-lg-12 text-center">
                            <i>Claimant Information</i><br><br>
                          </div>

                          <div class="col-lg-4">
                            <b>Name:</b>
                          </div>

                          <div class="col-lg-8">
                            <p>{{strtoupper($doctor->lastname.', '.$doctor->firstname.' '.$doctor->middlename)}}</p>
                          </div>

                          <div class="col-lg-4">
                            <b>Telephone:</b>
                          </div>

                          <div class="col-lg-8">
                            @php
                              $telephone = "";

                              if (empty($doctor->telephone)) {
                                $telephone = "None";
                              }
                              else {
                                $telephone = $doctor->telephone;
                              }
                            @endphp
                            <p>{{$telephone}}</p>
                          </div>

                          <div class="col-lg-4">
                            <b>Mobile:</b>
                          </div>

                          <div class="col-lg-8">
                            <p>{{$doctor->mobile}}</p>
                          </div>

                          <div class="col-lg-12"><hr></div>

                          <div class="col-lg-12 text-center">
                            <i>Hospital Information</i><br><br>
                          </div>

                          <div class="col-lg-4">
                            <b>Hospital:</b>
                          </div>

                          <div class="col-lg-8">
                            <p>{{strtoupper($doctor->hospital_name)}}</p>
                          </div>

                          <div class="col-lg-4">
                            <b>Address:</b>
                          </div>

                          <div class="col-lg-8">
                            <p>{{strtoupper($doctor->hospital_address)}}</p>
                          </div>

                          <div class="col-lg-12 "><hr></div>

                          <div class="col-lg-12 text-center">
                            <i>Filed By</i><br><br>
                          </div>

                          @php
                            $name = "";
                            $id = "";
                          @endphp

                          @foreach ($coordinator as $coor)
                            @php
                              $name = $coor->lastname.', '.$coor->firstname.' '.$coor->middlename;
                              $id = $coor->employee_id;
                            @endphp
                          @endforeach

                          <div class="col-lg-4">
                            <b>Name:</b>
                          </div>

                          <div class="col-lg-8">
                            <p>{{strtoupper($name)}}</p>
                          </div>

                          <div class="col-lg-4">
                            <b>Coordinator ID:</b>
                          </div>

                          <div class="col-lg-8">
                            <p>{{$id}}</p>
                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <div class="col-lg-4">

                <div class="card">

                  <div class="card-header bg-primary">
                    <h5>Patient(s)</h5>
                  </div>

                  <div style="height: 650px; overflow-y: auto;" class="card-body">
                  </div>

                </div>

              </div>

              <div class="col-lg-4">

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
  </div>

@endsection


















{{--  --}}
