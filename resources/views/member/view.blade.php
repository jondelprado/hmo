@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Member</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaction</li>
            <li class="breadcrumb-item">Contract</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/transaction/contract/member">Member</a>
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

                  <div style="height: 400px; overflow-y: auto;" class="card-body">
                    <div class="row">

                      <div class="col-lg-12 text-center">
                        @php
                          $fullname = $member->lastname.", ".$member->firstname." ".$member->middlename;
                        @endphp
                        <h5>{{strtoupper($fullname)}}</h5>
                        <hr>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Birthdate:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{date('M j, Y', strtotime($member->bday))}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Age:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->age}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Height:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->height}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Weight:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->weight}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Gender:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->gender}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Civil Status:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->civil}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Address:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->address}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Occupation:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->occupation}}</p>
                          </div>
                        </div>
                      </div>

                      @if (!empty($member->telephone))
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-lg-6">
                              <b>Telephone:</b>
                            </div>

                            <div class="col-lg-6">
                              <p>{{$member->telephone}}</p>
                            </div>
                          </div>
                        </div>
                      @endif

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Mobile:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->mobile}}</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <b>Email:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->email}}</p>
                          </div>
                        </div>
                      </div>

                      @if (!empty($memberpecs))
                        <div class="col-lg-12">
                          <hr>
                          <div class="row">
                            <div class="col-lg-12 text-center">
                              <b>Pre Existing Condition:</b>
                            </div>

                            <div class="col-lg-12 ">
                              <ul>
                                @foreach ($memberpecs as $memberpec)
                                  <li>{{$memberpec->condition}}</li>
                                @endforeach
                              </ul>
                            </div>
                          </div>
                        </div>
                      @endif

                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">

                  <div class="card-header bg-success">
                    <h5>Dependent(s)</h5>
                  </div>

                  <div style="height: 400px; overflow-y: auto;" class="card-body">
                    <div class="row">

                      @if (!empty($member->dependent_id))
                        @foreach ($dependents as $dependent)
                          <div class="col-lg-12">
                            <div class="row">

                              <div class="col-lg-6">
                                <b>Name:</b>
                              </div>

                              <div class="col-lg-6">
                                <p>{{$dependent->name}}</p>
                              </div>

                              <div class="col-lg-6">
                                <b>Birthdate:</b>
                              </div>

                              <div class="col-lg-6">
                                <p>{{$dependent->bday}}</p>
                              </div>

                              <div class="col-lg-6">
                                <b>Relationship:</b>
                              </div>

                              <div class="col-lg-6">
                                <p>{{$dependent->relationship}}</p>
                              </div>

                              <div class="col-lg-6">
                                <b>Civil Status:</b>
                              </div>

                              <div class="col-lg-6">
                                <p>{{$dependent->civil}}</p>
                              </div>

                            </div>
                            <hr>
                          </div>
                        @endforeach
                      @else
                        <div class="alert alert-danger alert-dismissible">
                          {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                          <h5><i class="icon fas fa-exclamation-triangle"></i> No Dependent(s) Found</h5><br>
                          <p class="text-center">This member currently have no dependent listed in his/her contract.</p>
                        </div>
                      @endif

                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">

                  <div class="card-header bg-primary">
                    <h5>Contract Details</h5>
                  </div>

                  <div style="height: 400px; overflow-y: auto;" class="card-body">

                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                          Plan
                        </div>
                      </div>

                      <b>{{$plan->plan}}</b>
                      <hr>
                      Maximum Benefit Limit: Php
                      <b>{{$plan->benefit}}</b>
                      <hr>
                      <a href="#" data-toggle="modal" data-target="#view_plan_{{$plan->id}}">
                        <small style="color: lightgreen;"><i>Click here for more details.</i></small>
                      </a>
                    </div>

                    <hr>

                    <div class="row">

                      <div class="col-lg-12">
                        <div class="row">

                          <div class="col-lg-6">
                            <b>Membership Type:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$membership->type}}</p>
                          </div>

                        </div>
                      </div>

                      @if (!empty($company))
                        <div class="col-lg-12">
                          <div class="row">

                            <div class="col-lg-6">
                              <b>Company:</b>
                            </div>

                            <div class="col-lg-6">
                              <p>{{$company->name}}</p>
                            </div>

                          </div>
                        </div>
                      @endif

                      <div class="col-lg-12">
                        <div class="row">

                          <div class="col-lg-6">
                            <b>Payment Frequency:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{$member->frequency}}</p>
                          </div>

                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">

                          <div class="col-lg-6">
                            <b>Payment:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>Php {{$member->payment}}</p>
                          </div>

                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">

                          <div class="col-lg-6">
                            <b>Entry Date:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{date('M j, Y \- g:ia' , strtotime($member->created_at))}}</p>
                          </div>

                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">

                          <div class="col-lg-6">
                            <b>End of Contract:</b>
                          </div>

                          <div class="col-lg-6">
                            <p>{{date('M j, Y', strtotime($member->endo))}}</p>
                          </div>

                        </div>
                      </div>

                    </div>

                    <div id="view_plan_{{$plan->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header bg-success">
                            <h4 class="modal-title">View Plan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                              <span aria-hidden="true">x</span>
                            </button>
                          </div>

                          <div class="modal-body">

                            <div class="card">

                              <div class="card-header text-center">
                                <h4>{{$plan->plan}}</h4>
                              </div>

                              <div class="card-body">
                                <div class="row">

                                  <div class="col-lg-6">
                                    <p>Standard Services: </p>
                                    <ul>
                                      @foreach ($standards as $standard)
                                        <li>{{$standard->standard}}</li>
                                      @endforeach
                                    </ul>
                                  </div>

                                  @if (!$additionals)
                                    <div class="col-lg-6">
                                      <p>Additional Services: </p>
                                      <ul>
                                        @foreach ($additionals as $additional)
                                          <li>{{$additional->additional}}</li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  @endif

                                  @if (!$pecs)
                                    <div class="col-lg-6">
                                      <p>Pre Existing Condition: </p>
                                      <ul>
                                        @foreach ($pecs as $pec)
                                          <li>{{$pec->condition}}</li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  @endif

                                  <div class="col-lg-6">
                                    @php
                                      $explode_plan_hospital = explode(',', $plan->hospital);
                                    @endphp
                                    <p>Applicable for: </p>
                                    <ul>
                                      @foreach ($explode_plan_hospital as $hospital)
                                        <li>{{$hospital}} Hospitals</li>
                                      @endforeach
                                    </ul>
                                  </div>

                                  <div class="col-lg-12">
                                    <hr>

                                    <div class="row">
                                      <div class="col-lg-6">
                                        Maximum Benefit Limit: <br>
                                        <b>Php {{$plan->benefit}}</b><br>
                                      </div>
                                      <div class="col-lg-6">
                                        Annual Payment:<br>
                                        <b>Php {{$plan->annual}}</b>
                                      </div>
                                    </div>

                                  </div>

                                </div>
                              </div>

                              <div class="card-footer text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>

                            </div>

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
            <a href="http://localhost/hmo/public/transaction/contract/member" class="btn btn-danger">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
