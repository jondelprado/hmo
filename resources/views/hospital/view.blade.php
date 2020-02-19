@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Hospital</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaction</li>
            <li class="breadcrumb-item">Contract</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/transaction/contract/hospital">Hospital</a>
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
        <div class="card test">

          <div class="card-body">

            <div class="row">

              <div class="col-lg-4">
                <div class="card">

                  <div class="card-header bg-info">
                    <h5>Information</h5>
                  </div>

                  <div class="card-body">

                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>Name:</p>
                        </div>

                        <div class="col-lg-8">
                          <p>{{$hospital->name}}</p>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>Address:</p>
                        </div>

                        <div class="col-lg-8">
                          <p>{{$hospital->address}}</p>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>Region:</p>
                        </div>

                        <div class="col-lg-8">
                          <p>{{$hospital->region}}</p>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>Specification:</p>
                        </div>

                        <div class="col-lg-8">
                          <p>{{$hospital->specification}}</p>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">

                  <div class="card-header bg-success">
                    <h5>Coordinator</h5>
                  </div>

                  <div class="card-body">
                    @foreach ($coordinator as $c)

                      @php
                        $fullname = $c->lastname.", ".$c->firstname." ".$c->middlename;
                      @endphp

                      <div class="col-lg-12 text-center">
                        <h5>{{strtoupper($fullname)}}</h5>
                      </div>

                      <hr>

                      <div class="col-lg-12 text-center">
                        <img class="profile-user-img img-fluid img-square" src="{{asset('img/download.png')}}" alt="User profile picture">
                      </div>

                      <hr>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6 text-center">
                            <p>Age: {{$c->age}}</p>
                          </div>

                          <div class="col-lg-6 text-center">
                            <p><i class="fas fa-calendar-alt"></i> {{date('M j, Y', strtotime($c->bday))}}</p>
                          </div>

                          <div class="col-lg-12"><hr></div>

                          <div class="col-lg-12 text-center">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>{{$c->address}}</p>
                          </div>

                          <div class="col-lg-12"><hr></div>

                          <div class="col-lg-6 text-center">
                            <p><i class="fas fa-phone-alt"></i>{{$c->telephone}}</p>
                          </div>

                          <div class="col-lg-6 text-center">
                            <p><i class="fas fa-mobile-alt"></i>{{$c->mobile}}</p>
                          </div>

                          <div class="col-lg-12 text-center">
                            <p><i class="fas fa-at"></i>{{$c->email}}</p>
                          </div>

                        </div>

                      </div>

                    @endforeach

                  </div>

                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">

                  <div class="card-header bg-primary">
                    <h5>Contract Details</h5>
                  </div>

                  <div class="card-body">

                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-5">
                          <p>Entry Date:</p>
                        </div>

                        <div class="col-lg-7">
                          <p>{{date('M j, Y \a\t g:ia', strtotime($hospital->created_at))}}</p>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-5">
                          <p>Contract Type:</p>
                        </div>

                        <div class="col-lg-7">
                          <p>{{$hospital->contract}}</p>
                        </div>
                      </div>
                    </div>

                    @if ($hospital->contract == "Specific Date")
                      <hr>
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-5">
                            <p>End of Contract:</p>
                          </div>

                          <div class="col-lg-7">
                            <p>{{date('M j, Y', strtotime($hospital->endo))}}</p>
                          </div>
                        </div>
                      </div>
                    @endif

                  </div>

                </div>
              </div>


            </div>

          </div>

          <div class="card-footer text-center">
            <a href="http://localhost/hmo/public/transaction/contract/hospital" class="btn btn-danger">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection









{{--  --}}
