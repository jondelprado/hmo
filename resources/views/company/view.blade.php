@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Company</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaction</li>
            <li class="breadcrumb-item">Contract</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/transaction/contract/company">Company</a>
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

                  <div class="card-body">
                    <h4>{{$company->name}}</h4><br>
                    <p><i class="fas fa-map-marker-alt"></i> : {{$company->address}}</p>
                    <hr>
                    <p><i class="fas fa-phone-alt"></i> : {{$company->telephone}}</p>
                    <hr>
                    <p><i class="fas fa-mobile-alt"></i> : {{$company->mobile}}</p>
                    <hr>
                    <p><i class="fas fa-at"></i> : {{$company->email}}</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header bg-success">
                    <h5>Preferred Plan(s)</h5>
                  </div>
                  <div style="height: 400px; overflow-y: auto;" class="card-body">
                    @php
                      $explode_company_plan = explode(',', $company->plan_id);
                    @endphp

                    @foreach ($plans as $plan)
                      @if (in_array($plan->id, $explode_company_plan))
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
                        </div><br>

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

                                @php
                                  $explode_plan_standard = explode(',', $plan->standard_id);
                                  $explode_plan_additional = explode(',', $plan->additional_id);
                                  $explode_plan_pec = explode(',', $plan->pec_id);
                                  $explode_plan_membership = explode(',', $plan->membership_id);
                                  $explode_plan_hospital = explode(',', $plan->hospital);
                                @endphp

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
                                            @if (in_array($standard->id, $explode_plan_standard))
                                              <li>
                                                {{$standard->standard}}
                                              </li>
                                            @endif
                                          @endforeach
                                        </ul>
                                      </div>

                                      @if (!empty($plan->additional_id))
                                        <div class="col-lg-6">
                                          <p>Additional Services: </p>
                                          <ul>
                                            @foreach ($additionals as $additional)
                                              @if (in_array($additional->id, $explode_plan_additional))
                                                <li>
                                                  {{$additional->additional}}
                                                </li>
                                              @endif
                                            @endforeach
                                          </ul>
                                        </div>
                                      @endif


                                      @if (!empty($plan->pec_id))
                                        <div class="col-lg-6">
                                          <p>Pre Existing Condition: </p>
                                          <ul>
                                            @foreach ($pecs as $pec)
                                              @if (in_array($pec->id, $explode_plan_pec))
                                                <li>
                                                  {{$pec->condition}}
                                                </li>
                                              @endif
                                            @endforeach
                                          </ul>
                                        </div>
                                      @endif

                                      <div class="col-lg-6">
                                        <p>Applicable For: </p>
                                        <ul>
                                          @foreach ($explode_plan_hospital as $hospital)
                                            <li>
                                              {{$hospital}} Hospitals
                                            </li>
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

                      @endif
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
                          <p>{{date('M j, Y \a\t g:ia', strtotime($company->created_at))}}</p>
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
                          <p>{{$company->contract}}</p>
                        </div>
                      </div>
                    </div>


                    @if ($company->contract == "Specific Date")
                      <hr>
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-5">
                            <p>End of Contract:</p>
                          </div>
                          <div class="col-lg-7">
                            <p>{{date('M j, Y', strtotime($company->endo))}}</p>
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
            <a href="http://localhost/hmo/public/transaction/contract/company" class="btn btn-danger">Back</a>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection











{{--  --}}
