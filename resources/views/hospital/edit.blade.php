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
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>


    <div class="container-fluid">
      <div class="row">

      <div class="col-lg-7">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>End of Contract</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$hospital->name}}</td>
                  <td>{{$hospital->address}}</td>
                  <td>
                    @if (empty($hospital->endo))
                      Open End
                    @else
                      {{$hospital->endo}}
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-5">

        <div class="card">
          <div class="card-header bg-primary">
            <h4>Edit Hospital</h4>
          </div>

          <div class="card-body">

            <div class="form-group">
              @include('include.note')

              {!! Form::open(['action' => ['HospitalController@update', $hospital->id], 'method' => 'POST']) !!}

              <div class="row">
                <div class="col-lg-12">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Name</label>
                  <input type="text" class="form-control" name="hospital_name" placeholder="Input Hospital Name" value="{{$hospital->name}}"><br>
                </div>

                <div class="col-lg-12">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Address</label>
                  <input type="text" class="form-control" name="hospital_address" placeholder="Input Hospital Address" value="{{$hospital->address}}"><br>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Coordinator</label>
                  <select class="form-control select2 coor" name="hospital_coordinator">
                    @php
                      $selected_coordinator = "";
                    @endphp
                    @foreach ($coordinators as $coordinator)

                      @php
                      $fullname = $coordinator->lastname." ,".$coordinator->firstname." ".$coordinator->middlename;
                      @endphp

                      @if ($coordinator->employee_id == $hospital->coordinator_id)
                        <option value="{{$coordinator->employee_id}}" selected>{{strtoupper($fullname)}}</option>
                      @else
                        <option value="{{$coordinator->employee_id}}">{{strtoupper($fullname)}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Region</label>
                  <select class="form-control select2" name="hospital_region">
                    @php
                      $regionArray = array(
                        'ARMM',
                        'CAR',
                        'NCR',
                        'Region 1',
                        'Region 2',
                        'Region 3',
                        'Region 4-A',
                        'Region 4-B',
                        'Region 5',
                        'Region 6',
                        'Region 7',
                        'Region 8',
                        'Region 9',
                        'Region 10',
                        'Region 11',
                        'Region 12',
                        'Region 13',
                      );
                    @endphp
                    <option value="">--Select Region--</option>
                    @foreach ($regionArray as $region)
                      @if ($region == $hospital->region)
                        <option value="{{$hospital->region}}" selected>{{$hospital->region}}</option>
                      @else
                        <option value="{{$region}}">{{$region}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-6">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>Hospital Specification</label><br>
                  @php
                    $major = "";
                    $minor = "";
                  @endphp

                  @if ($hospital->specification == "Major")
                    @php
                      $major = "checked";
                    @endphp
                  @else
                    @php
                      $minor = "checked";
                    @endphp
                  @endif
                  <div class="icheck-success d-inline">
                    <input type="radio" name="hospital_specification" value="Major" id="radio1" {{$major}}>
                    <label for="radio1">Major</label>
                  </div><br>
                  <div class="icheck-success d-inline check_div">
                    <input type="radio" name="hospital_specification" value="Minor" id="radio2" {{$minor}}>
                    <label for="radio2">Minor</label>
                  </div>
                </div>

                <div class="col-lg-6">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>Contract Specification</label><br>
                  @php
                    $open = "";
                    $specific = "";
                  @endphp
                  @if ($hospital->contract == "Open End")
                    @php
                      $open = "checked";
                    @endphp
                  @else
                    @php
                      $specific = "checked";
                    @endphp
                  @endif
                  <div class="icheck-success d-inline">
                    <input type="radio" name="hospital_contract" value="Open End" id="radio3" {{$open}}>
                    <label for="radio3">Open End</label>
                  </div><br>
                  <div class="icheck-success d-inline check_div">
                    <input type="radio" name="hospital_contract" value="Specific Date" id="radio4" {{$specific}}>
                    <label for="radio4">Specific Date</label>
                  </div>
                </div>

                <div style="display: none;" id="endo_field" class="col-lg-12">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>End of Contract</label>
                  <input type="date" class="form-control" name="hospital_end_date" value="{{$hospital->endo}}">
                </div>

              </div>

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            {!! Form::hidden('_method', 'PUT') !!}
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/transaction/contract/hospital" class="btn btn-danger">Back</a>
          </div>

            {!! Form::close() !!}

        </div>

      </div>

      </div>
    </div>

    <script>

    if ($("[name='hospital_end_date']").val().length != 0) {
      $("#endo_field").show();
      $("#endo_field").addClass("open_field");
    }

    $("[name='hospital_name']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='hospital_address']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='hospital_coordinator']").on("change", function(){
      if ($(this).val().length != 0) {
        $(".select2-selection").first().css("border-color", "green");
      }
      else {
        $(".select2-selection").first().css("border-color", "red");
      }
    });

    $("[name='hospital_region']").on("change", function(){
      if ($(this).val().length != 0) {
        $(".select2-selection").last().css("border-color", "green");
      }
      else {
        $(".select2-selection").last().css("border-color", "red");
      }
    });

    $("[name='hospital_contract']").on("click", function(){
      // console.log($(this).val());
      if ($(this).val() == "Specific Date") {
        $("#endo_field").fadeIn();
        $("#endo_field").addClass("open_field");
      }
      else {
        $("#endo_field").fadeOut();
        $("#endo_field").removeClass("open_field");
        $("[name='hospital_end_date']").val("");
      }
    });

    $("[name='hospital_end_date']").on("change", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("#submit").on("click", function(e){

      var name = $("[name='hospital_name']");
      var address = $("[name='hospital_address']");
      var coordinator = $("[name='hospital_coordinator']");
      var region = $("[name='hospital_region']");
      var date = $("[name='hospital_end_date']");

      if (name.val().length == 0) {
        e.preventDefault();
        toastr.error("Name is Required!");
        name.css("border-color", "red");
      }

      if (address.val().length == 0) {
        e.preventDefault();
        toastr.error("Address is Required!");
        address.css("border-color", "red");
      }

      if (coordinator.val().length == 0) {
        e.preventDefault();
        toastr.error("Coordinator is Required!");
        $(".select2-selection").first().css("border-color", "red");
      }

      if (region.val().length == 0) {
        e.preventDefault();
        toastr.error("Region is Required!");
        $(".select2-selection").last().css("border-color", "red");
      }

      if ($("#endo_field").hasClass("open_field")) {

        if (date.val().length == 0) {
          e.preventDefault();
          toastr.error("Date is Required!");
          date.css("border-color", "red");
        }

      }

    });

  </script>
@endsection













{{--  --}}
