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
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th><small><b>Plan</b></small></th>
                  <th><small><b>Applicable For</b></small></th>
                  <th><small><b>Amount Limit</b></small></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($plans as $plan)
                  <tr>
                    <td>{{$plan->plan}}</td>
                    <td>
                      @php
                        $explode_membership = explode(',', $plan->membership_id);
                      @endphp
                      @foreach ($memberships as $membership)
                        @if (in_array($membership->id, $explode_membership))
                          {{$membership->type}}<br>
                        @endif
                      @endforeach
                    </td>
                    <td>₱ {{number_format($plan->benefit, 2)}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-primary">
            <h4>Create Plan</h4>
          </div>

          <div class="card-body" style="overflow-y: auto; height: 400px;">
            {!! Form::open(['action' => 'PlanController@store', 'method' => 'POST']) !!}

            <div class="form-group clearfix">
              @include('include.note')

              <div class="row">

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Plan</label>
                  <input type="text" class="form-control" name="plan_name" placeholder="Input Plan Name"><br>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Hospital Type</label><br>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" name="plan_hospital[]" value="Major" id="checkbox2">
                    <label for="checkbox2">Major</label>
                  </div><br>
                  <div class="icheck-success d-inline check_div">
                    <input type="checkbox" name="plan_hospital[]" value="Minor" id="checkbox3">
                    <label for="checkbox3">Minor</label>
                  </div>
                </div>
              </div>

              <i class="fas fa-asterisk ast"></i>
              <label>Standard Services</label>
              <select name="plan_standard[]" class="duallistbox" multiple>
                @foreach ($standards as $standard)
                  <option value="{{$standard->id}}">{{$standard->standard}}</option>
                @endforeach
              </select><br>

              <label>Additional Services</label>
              <select name="plan_additional[]" class="duallistbox" multiple>
                @foreach ($additionals as $additional)
                  <option value="{{$additional->id}}">{{$additional->additional}}</option>
                @endforeach
              </select><br>

              <label>Pre Existing Condition</label>
              <select name="plan_pec[]" class="duallistbox" multiple>
                @foreach ($pecs as $pec)
                  <option value="{{$pec->id}}">{{$pec->condition}}</option>
                @endforeach
              </select><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Membership Type</label>
              <select name="plan_membership[]" class="duallistbox" multiple>
                @foreach ($memberships as $membership)
                  <option value="{{$membership->id}}">{{$membership->type}}</option>
                @endforeach
              </select><br>

              <div class="row">

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Maximum Benefit Limit</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">₱</span>
                    </div>
                    <input type="text" class="form-control text-left currency" name="plan_benefit"
                    data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false,'placeholder': '0'">
                  </div>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Annual Payment</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">₱</span>
                    </div>
                    <input type="text" class="form-control text-left currency" name="plan_annual"
                    data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false,'placeholder': '0'">
                  </div>
                </div>


              </div>

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/maintenance/plan" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>

  <script>

    $("[name='plan_name']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='plan_standard[]']").on("change", function(){
      if ($(this).val().length == 0) {
        $("[name='plan_standard[]_helper2']").css("border-color", "red");
      }
      else {
        $("[name='plan_standard[]_helper2']").css("border-color", "green");
      }
    });

    $("[name='plan_membership[]']").on("change", function(){
      if ($(this).val().length == 0) {
        $("[name='plan_membership[]_helper2']").css("border-color", "red");
      }
      else {
        $("[name='plan_membership[]_helper2']").css("border-color", "green");
      }
    });

    $("[name='plan_benefit']").on("keyup", function(){
      if ($(this).val().length != 0 && $(this).val() != "0.00") {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='plan_annual']").on("keyup", function(){
      if ($(this).val().length != 0 && $(this).val() != "0.00") {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });


    $("#submit").on("click",function(e){

      var name = $("[name='plan_name']");
      var standard = $("[name='plan_standard[]']");
      var standard2 = $("[name='plan_standard[]_helper2']");
      var membership = $("[name='plan_membership[]']");
      var membership2 = $("[name='plan_membership[]_helper2']");
      var benefit = $("[name='plan_benefit']");
      var annual = $("[name='plan_annual']");

      if (name.val().length === 0) {
        toastr.error("Plan Name is Required");
        e.preventDefault(e);
        name.css("border-color", "red");
      }

      if (standard.val().length == 0) {
        toastr.error("Standard Services are Required");
        e.preventDefault(e);
        standard2.css("border-color", "red");
      }

      if (membership.val().length == 0) {
        toastr.error("Membership Type is Required");
        e.preventDefault(e);
        membership2.css("border-color", "red");
      }

      if (benefit.val().length === 0 || benefit.val() === "0.00") {
        toastr.error("Maximum Benefit Limit is Required");
        e.preventDefault(e);
        benefit.css("border-color", "red");
      }

      if (annual.val().length === 0 || annual.val() === "0.00") {
        toastr.error("Annual Payment is Required");
        e.preventDefault(e);
        annual.css("border-color", "red");
      }

    });

  </script>

@endsection
















{{--  --}}
