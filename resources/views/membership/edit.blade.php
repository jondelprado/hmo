@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Membership</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/membership">Membership</a>
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
                  <th>Type</th>
                  <th>Additional Plan <br> Mark-Up Interest</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$membership->type}}</td>
                  <td>{{number_format($membership->interest, 2)}} %</td>
                  <td>{{$membership->description}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card">
          <div class="card-header bg-primary">
            <h4>Edit Membership</h4>
          </div>

          <div class="card-body">
            {!! Form::open(['action' => ['MembershipController@update', $membership->id], 'method' => 'POST']) !!}

            <div class="form-group">
              @include('include.note')

              <i class="fas fa-asterisk ast"></i>
              <label>Type</label>
              <input type="text" class="form-control" name="membership_type" value="{{$membership->type}}" placeholder="Input Membership Type"><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Additional Plan Mark-Up Interest</label>
              <div class="input-group">
                <input type="text" class="form-control text-left currency" name="membership_interest" value="{{$membership->interest}}"
                data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false,'placeholder': '0'">
                <div class="input-group-append">
                  <span class="input-group-text">%</span>
                </div>
              </div><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Description</label>
              <textarea name="membership_desc" class="form-control" rows="3" placeholder="Input Membership Description">{{$membership->description}}</textarea>

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            {!! Form::hidden('_method', 'PUT') !!}
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/maintenance/membership" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>

  <script>

    $("[name='membership_type']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='membership_interest']").on("keyup", function(){
      if ($(this).val().length != 0 && $(this).val() != "0.00") {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='membership_desc']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });


    $("#submit").on("click",function(e){

      var type = $("[name='membership_type']");
      var interest = $("[name='membership_interest']");
      var desc = $("[name='membership_desc']");

      if (type.val().length === 0) {
        toastr.error("Membership Type is Required");
        e.preventDefault(e);
        type.css("border-color", "red");
      }

      if (interest.val().length === 0 || interest.val() === "0.00") {
        toastr.error("Membership Interest is Required");
        e.preventDefault(e);
        interest.css("border-color", "red");
      }

      if (desc.val().length === 0) {
        toastr.error("Membership Description is Required");
        e.preventDefault(e);
        desc.css("border-color", "red");
      }

    });

  </script>

@endsection
















{{--  --}}
