@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Plan</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/plan">Plan</a>
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
          <div class="card-header">
            <div class="card-title">
              <a href="http://localhost/hmo/public/maintenance/plan" class="btn btn-danger">Back</a>
            </div>
          </div>

          <div class="card-body">

            <div class="row">

              <div class="col-lg-4 col-sm-12">
                <div class="position-relative p-3 bg-gray" style="height: 180px">
                  <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-success text-lg">
                      HMO
                    </div>
                  </div>
                  Health Maintenance Organization<br><br>
                  {{$plan->plan}} Plan<br>
                </div><br>
              </div>

              <div class="col-lg-4 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">

                  <a class="nav-link active" id="vert-tabs-standard-tab" data-toggle="pill"
                     href="#vert-tabs-standard" role="tab" aria-controls="vert-tabs-standard"
                     aria-selected="true">Standard Services</a>

                  <a class="nav-link" id="vert-tabs-additional-tab" data-toggle="pill"
                      href="#vert-tabs-additional" role="tab" aria-controls="vert-tabs-additional"
                      aria-selected="false">Additional Services</a>

                  <a class="nav-link" id="vert-tabs-pec-tab" data-toggle="pill"
                      href="#vert-tabs-pec" role="tab" aria-controls="vert-tabs-pec"
                      aria-selected="false">Pre Existing Condition</a>

                  <a class="nav-link" id="vert-tabs-membership-tab" data-toggle="pill"
                      href="#vert-tabs-membership" role="tab" aria-controls="vert-tabs-membership"
                      aria-selected="false">Membership Type</a>

                  <a class="nav-link" id="vert-tabs-hospital-tab" data-toggle="pill"
                      href="#vert-tabs-hospital" role="tab" aria-controls="vert-tabs-hospital"
                      aria-selected="false">Hospital Type</a>

                  <a class="nav-link" id="vert-tabs-benefit_annual-tab" data-toggle="pill"
                      href="#vert-tabs-benefit_annual" role="tab" aria-controls="vert-tabs-benefit_annual"
                      aria-selected="false">Benefit Limit & Annual Payment</a>

                </div>
              </div>
              <div class="col-lg-4 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  @php
                  $explode_standard_plan = explode(',', $plan->standard_id);
                  $explode_additional_plan = explode(',', $plan->additional_id);
                  $explode_pec_plan = explode(',', $plan->pec_id);
                  $explode_membership_plan = explode(',', $plan->membership_id);
                  $explode_hospital_plan = explode(',', $plan->hospital);
                  @endphp

                  <div class="tab-pane text-left fade active show" id="vert-tabs-standard" role="tabpanel" aria-labelledby="vert-tabs-standard-tab">
                    <blockquote class="quote-success">
                      <p>Standard Services that included in the Plan:</p>
                      <ul>
                        @foreach ($standards as $standard)
                            @if (in_array($standard->id, $explode_standard_plan))
                              <li>
                                <b>{{$standard->standard}}</b>
                                <ul>
                                  @php
                                  $explode_coverage_standard = explode(',', $standard->coverage);
                                  @endphp
                                  @foreach ($coverages as $coverage)
                                    @if (in_array($coverage->id, $explode_coverage_standard))
                                      <li><i>{{$coverage->coverage}}</i></li>
                                    @endif
                                  @endforeach
                                </ul>

                              </li>
                            @endif
                        @endforeach
                      </ul>
                    </blockquote>
                  </div>

                  <div class="tab-pane fade" id="vert-tabs-additional" role="tabpanel" aria-labelledby="vert-tabs-additional-tab">
                    @if (!empty($plan->additional_id))

                      <blockquote class="quote-info">
                        <p>Additional Services that included in the Plan:</p>
                        <ul>
                          @foreach ($additionals as $additional)
                            @if (in_array($additional->id, $explode_additional_plan))
                              <li>
                                <b>{{$additional->additional}}</b>
                                <ul>
                                  @php
                                  $explode_coverage_additional = explode(',', $additional->coverage);
                                  @endphp
                                  @foreach ($coverages as $coverage)
                                    @if (in_array($coverage->id, $explode_coverage_additional))
                                      <li><i>{{$coverage->coverage}}</i></li>
                                    @endif
                                  @endforeach
                                </ul>

                              </li>
                            @endif
                          @endforeach
                        </ul>
                      </blockquote>
                    @else
                      <blockquote class="quote-info">
                        <p>There's no Additional Services included in this Plan.</p>
                      </blockquote>
                    @endif
                  </div>

                  <div class="tab-pane fade" id="vert-tabs-pec" role="tabpanel" aria-labelledby="vert-tabs-pec-tab">
                    @if (!empty($plan->pec_id))
                      <blockquote class="quote-warning">
                        <p>Pre Existing Conditions included in the Plan:</p>
                        <ul>
                          @foreach ($pecs as $pec)
                            @if (in_array($pec->id, $explode_pec_plan))
                              <li>
                                <b>{{$pec->condition}}</b>
                              </li>
                            @endif
                          @endforeach
                        </ul>
                      </blockquote>
                    @else
                      <blockquote class="quote-warning">
                        <p>There's no Pre Existing Condition included in this Plan.</p>
                      </blockquote>
                    @endif
                  </div>

                  <div class="tab-pane fade" id="vert-tabs-membership" role="tabpanel" aria-labelledby="vert-tabs-membership-tab">
                     <blockquote class="quote-primary">
                       <p>This Plan is applicable for:</p>
                       <ul>
                         @foreach ($memberships as $membership)
                           @if (in_array($membership->id, $explode_membership_plan))
                             <li>
                               <b>{{$membership->type}}</b>
                             </li>
                           @endif
                         @endforeach
                       </ul>
                     </blockquote>
                  </div>

                  <div class="tab-pane fade" id="vert-tabs-benefit_annual" role="tabpanel" aria-labelledby="vert-tabs-benefit_annual-tab">
                    <blockquote class="quote-secondary">
                      <p>Maximum Benefit Limit</p>
                      <ul>
                        <li>₱ {{number_format($plan->benefit, 2)}}</li>
                      </ul>
                    </blockquote>

                    <blockquote class="quote-secondary">
                      <p>Annual Payment</p>
                      <ul>
                        <li>₱ {{number_format($plan->annual, 2)}}</li>
                      </ul>
                    </blockquote>
                  </div>

                  <div class="tab-pane fade" id="vert-tabs-hospital" role="tabpanel" aria-labelledby="vert-tabs-hospital-tab">
                    <blockquote class="quote-success">
                      <p>Applicable for any:</p>
                      <ul>
                        @foreach ($explode_hospital_plan as $hospital)
                          <li>{{$hospital}} Hospitals</li>
                        @endforeach
                      </ul>
                    </blockquote>
                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection












{{--  --}}
