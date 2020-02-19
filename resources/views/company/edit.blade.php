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
            <li class="breadcrumb-item active">Edit</li>
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
            <table class="table table-bordered table-hover transaction_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>End of Contract</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$company->name}}</td>
                  <td>{{$company->address}}</td>
                  <td>
                    @if (empty($company->endo))
                      {{$company->contract}}
                    @else
                      {{$company->endo}}
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">

          <div class="card-header bg-primary">
            <h4>Edit Company</h4>
          </div>

          <div class="card-body">
            @include('include.note')

            <div class="form-group">
                {!! Form::open(['action' => ['CompanyController@update', $company->id], 'method' => 'POST']) !!}
                <div class="row">

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Name</label>
                  <input type="text" class="form-control" name="company_name" value="{{$company->name}}" placeholder="Input Company Name"><br>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Address</label>
                  <input type="text" class="form-control" name="company_address" value="{{$company->address}}" placeholder="Input Company Address"><br>
                </div>

                <div class="col-lg-12">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Preferred Plan(s)</label>
                  @php
                    $explode_company_plan = explode(",", $company->plan_id);
                  @endphp
                  <select name="company_plan[]" class="duallistbox" multiple>
                    @foreach ($plans as $plan)

                      @php
                        $explode_plan_membership = explode(',', $plan->membership_id);
                      @endphp

                      @if (in_array($membership->id, $explode_plan_membership))

                        @if (in_array($plan->id, $explode_company_plan))
                          <option value="{{$plan->id}}" selected>{{$plan->plan}}</option>
                        @else
                          <option value="{{$plan->id}}">{{$plan->plan}}</option>
                        @endif
                        
                      @endif

                    @endforeach
                  </select><br>
                </div>

                <div class="col-lg-4">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Telephone</label>
                  <input type="text" class="form-control" value="{{$company->telephone}}" name="company_telephone">
                </div>

                <div class="col-lg-4">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Mobile</label>
                  <input type="text" class="form-control" value="{{$company->mobile}}" name="company_mobile">
                </div>

                <div class="col-lg-4">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Email</label>
                  <input type="email" class="form-control" value="{{$company->email}}" name="company_email">
                </div>

                <div class="col-lg-6">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>Contract Specification</label><br>

                  @php
                    $open = "";
                    $specific = "";
                  @endphp

                  @if ($company->contract == "Open End")
                    @php
                      $open = "checked";
                    @endphp
                  @else
                    @php
                      $specific = "checked";
                    @endphp
                  @endif

                  <div class="icheck-success d-inline">
                    <input type="radio" name="company_contract" value="Open End" id="radio1" {{$open}}>
                    <label for="radio1">Open End</label>
                  </div><br>
                  <div class="icheck-success d-inline check_div">
                    <input type="radio" name="company_contract" value="Specific Date" id="radio2" {{$specific}}>
                    <label for="radio2">Specific Date</label>
                  </div>
                </div>

                <div style="display: none;" id="endo_field" class="col-lg-6">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>End of Contract</label>
                  <input type="date" class="form-control" name="company_endo" value="{{$company->endo}}">
                </div>

              </div>
            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <input type="hidden" name="_method" value="PUT">
            <a href="http://localhost/hmo/public/transaction/contract/company" class="btn btn-danger">Back</a>
          </div>

          {!! Form::close() !!}

        </div>

      </div>

    </div>

  </div>

  <script>

    if ($("[name='company_endo']").val().length != 0) {
      $("#endo_field").show();
      $("#endo_field").addClass("open_field");
    }

    $("[name='company_name']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='company_address']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='company_telephone']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='company_mobile']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='company_email']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='company_plan[]']").on("change", function(){
      if ($(this).val().length == 0) {
        $("[name='company_plan[]_helper2']").css("border-color", "red");
      }
      else {
        $("[name='company_plan[]_helper2']").css("border-color", "green");
      }
    });

    $("[name='company_contract']").on("click", function(){
      // console.log($(this).val());
      if ($(this).val() == "Specific Date") {
        $("#endo_field").fadeIn();
        $("#endo_field").addClass("open_field");
      }
      else {
        $("#endo_field").fadeOut();
        $("#endo_field").removeClass("open_field");
        $("[name='company_endo']").val("");
      }
    });

    $("#submit").on("click", function(e){

      if ($("[name='company_name']").val().length == 0) {
        e.preventDefault();
        toastr.error("Name is Required!");
        $("[name='company_name']").css("border-color", "red");
      }

      if ($("[name='company_address']").val().length == 0) {
        e.preventDefault();
        toastr.error("Address is Required!");
        $("[name='company_address']").css("border-color", "red");
      }

      if ($("[name='company_plan[]']").val().length == 0) {
        e.preventDefault();
        toastr.error("Plan is Required!");
        $("[name='company_plan[]_helper2']").css("border-color", "red");
      }

      if ($("[name='company_telephone']").val().length == 0) {
        e.preventDefault();
        toastr.error("Telephone is Required!");
        $("[name='company_telephone']").css("border-color", "red");
      }

      if ($("[name='company_mobile']").val().length == 0) {
        e.preventDefault();
        toastr.error("Mobile is Required!");
        $("[name='company_mobile']").css("border-color", "red");
      }

      if ($("[name='company_email']").val().length == 0) {
        e.preventDefault();
        toastr.error("Email is Required!");
        $("[name='company_email']").css("border-color", "red");
      }

      if ($("#endo_field").hasClass("open_field")) {

        if ($("[name='company_endo']").val().length == 0) {
          e.preventDefault();
          toastr.error("Date is Required!");
          date.css("border-color", "red");
        }

      }

    });

  </script>

@endsection










{{--  --}}
