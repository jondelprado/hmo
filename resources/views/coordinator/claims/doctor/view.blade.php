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

                    <div class="row">

                      <div class="col-lg-12">
                          @foreach ($patient as $pat)

                            @php
                              $fullname = $pat->lastname.', '.$pat->firstname.' '.$pat->middlename;
                            @endphp


                              <div class="row">

                                <div class="col-lg-6">
                                  <p><b>Name: </b></p>
                                  <p><b>Card ID: </b></p>
                                  <p><b>Total Amount: </b></p>
                                </div>

                                <div class="col-lg-6">
                                  <p>{{strtoupper($fullname)}}</p>
                                  <p>{{$pat->card_id}}</p>
                                  <p>{{$pat->amount}}</p>
                                </div>

                                <div class="col-lg-12">
                                  @foreach ($services as $service)
                                    @if ($service->patient_id == $pat->patient_id)
                                      <p>{{$service->service_name}}</p>
                                    @endif
                                  @endforeach
                                </div>

                            @endforeach

                            {{-- <div class="col-lg-12">
                              <h5>Medical Service(s) Conducted</h5>

                              @foreach ($services as $service)
                                <p>{{$service->service_name}}</p>
                              @endforeach

                            </div> --}}

                            <div class="col-lg-12"><hr></div>

                          </div>

                        </div>

                    </div>

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
