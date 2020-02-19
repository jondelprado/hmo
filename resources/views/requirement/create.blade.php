@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Requirement</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/requirement">Requirement</a>
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
                  <th>Requirement</th>
                  <th>Type</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($requirements as $requirement)
                  <tr>
                    <td>{{$requirement->requirement}}</td>
                    <td>{{$requirement->type}}</td>
                    <td>{{$requirement->description}}</td>
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
            <h4>Create Requirement</h4>
          </div>

          <div class="card-body">
            {!! Form::open(['action' => 'RequirementController@store', 'method' => 'POST']) !!}

            <div class="form-group">
              @include('include.note')

              <i class="fas fa-asterisk ast"></i>
              <label>Requirement</label>
              <input type="text" class="form-control" name="requirement_name" placeholder="Input Requirement Name"><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Type</label>
              <select class="form-control select2" name="requirement_type">
                <option value="" selected>-Select Requirement Type-</option>
                <option value="Doctor Claim">Doctor Claim</option>
                <option value="Patient Claim">Patient Claim</option>
              </select><br><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Description</label>
              <textarea name="requirement_desc" class="form-control" rows="3" placeholder="Input Requirement Description"></textarea>

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/maintenance/requirement" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>

  <script>

    $("[name='requirement_name']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='requirement_type']").on("change", function(){
      if ($(this).val().length != 0) {
        $(".select2-selection").css("border-color", "green");
      }
      else {
        $(".select2-selection").css("border-color", "red");
      }
    });

    $("[name='requirement_desc']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });


    $("#submit").on("click",function(e){

      var name = $("[name='requirement_name']");
      var type = $("[name='requirement_type']");
      var desc = $("[name='requirement_desc']");

      if (name.val().length === 0) {
        toastr.error("Requirement Name is Required");
        e.preventDefault(e);
        name.css("border-color", "red");
      }

      if (type.val().length === 0) {
        toastr.error("Requirement Type is Required");
        e.preventDefault(e);
        $(".select2-selection").css("border-color", "red");
      }

      if (desc.val().length === 0) {
        toastr.error("Requirement Description is Required");
        e.preventDefault(e);
        desc.css("border-color", "red");
      }

    });

  </script>

@endsection
















{{--  --}}
