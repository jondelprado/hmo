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
            <li class="breadcrumb-item active">Create</li>
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
                @foreach ($hospitals as $hospital)
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
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-5">

        <div class="card">
          <div class="card-header bg-primary">
            <h4>Create Hospital</h4>
          </div>

          <div class="card-body">

            <div class="form-group">
              @include('include.note')

              {!! Form::open(['action' => 'HospitalController@store', 'method' => 'POST']) !!}

              <div class="row">
                <div class="col-lg-12">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Name</label>
                  <input type="text" class="form-control" name="hospital_name" placeholder=""><br>
                </div>

                <div class="col-lg-12">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Address</label>
                  <input type="text" class="form-control" name="hospital_address" value=""><br>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Coordinator</label>
                  <select class="form-control select2 coor" name="hospital_coordinator">
                    <option value="">--Select Coordinator--</option>
                    @foreach ($coordinators as $coordinator)
                      @php
                        $fullname = $coordinator->lastname.", ".$coordinator->firstname." ".$coordinator->middlename;
                      @endphp
                      <option value="{{$coordinator->employee_id}}">{{strtoupper($fullname)}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-6">
                  <i class="fas fa-asterisk ast"></i>
                  <label>Region</label>
                  <select class="form-control select2" name="hospital_region">
                    <option value="">--Select Region--</option>
                    <option value="ARMM">ARMM</option>
                    <option value="CAR">CAR</option>
                    <option value="NCR">NCR</option>
                    <option value="Region 1">Region 1</option>
                    <option value="Region 2">Region 2</option>
                    <option value="Region 3">Region 3</option>
                    <option value="Region 4-A">Region 4-A</option>
                    <option value="Region 4-B">Region 4-B</option>
                    <option value="Region 5">Region 5</option>
                    <option value="Region 6">Region 6</option>
                    <option value="Region 7">Region 7</option>
                    <option value="Region 8">Region 8</option>
                    <option value="Region 9">Region 9</option>
                    <option value="Region 10">Region 10</option>
                    <option value="Region 11">Region 11</option>
                    <option value="Region 12">Region 12</option>
                    <option value="Region 13">Region 13</option>
                  </select>
                </div>

                <div class="col-lg-6">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>Hospital Specification</label><br>
                  <div class="icheck-success d-inline">
                    <input type="radio" name="hospital_specification" value="Major" id="radio1">
                    <label for="radio1">Major</label>
                  </div><br>
                  <div class="icheck-success d-inline check_div">
                    <input type="radio" name="hospital_specification" value="Minor" id="radio2">
                    <label for="radio2">Minor</label>
                  </div>
                </div>

                <div class="col-lg-6">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>Contract Specification</label><br>
                  <div class="icheck-success d-inline">
                    <input type="radio" name="hospital_contract" value="Open End" id="radio3">
                    <label for="radio3">Open End</label>
                  </div><br>
                  <div class="icheck-success d-inline check_div">
                    <input type="radio" name="hospital_contract" value="Specific Date" id="radio4">
                    <label for="radio4">Specific Date</label>
                  </div>
                </div>

                <div style="display: none;" id="endo_field" class="col-lg-12">
                  <br>
                  <i class="fas fa-asterisk ast"></i>
                  <label>End of Contract</label>
                  <input type="date" class="form-control" name="hospital_end_date" value="{{$currentDate->toDateString()}}">
                </div>

              </div>

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/transaction/contract/hospital" class="btn btn-danger">Back</a>
          </div>

            {!! Form::close() !!}

        </div>

      </div>

      </div>
    </div>

    <script>

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
