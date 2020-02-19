@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Pre Existing Condition</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/pre-existing-condition">Pre Existing Condition</a>
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
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$pec->condition}}</td>
                  <td>{{$pec->description}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card">
          <div class="card-header bg-primary">
            <h4>Edit Pre Existing Condition</h4>
          </div>

          <div class="card-body">
            {!! Form::open(['action' => ['PECController@update', $pec->id], 'method' => 'POST']) !!}

            <div class="form-group">
              @include('include.note')

              <i class="fas fa-asterisk ast"></i>
              <label>Pre Existing Condition</label>
              <input type="text" class="form-control" name="pec_name" value="{{$pec->condition}}" placeholder=" Pre Existing Condition"><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Description</label>
              <textarea name="pec_desc" class="form-control" rows="3" placeholder="Input Description">{{$pec->description}}</textarea>

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            {!! Form::hidden('_method', 'PUT') !!}
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/maintenance/pre-existing-condition" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>

  <script>

    $("[name='pec_name']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });

    $("[name='pec_desc']").on("keyup", function(){
      if ($(this).val().length != 0) {
        $(this).css("border-color", "green");
      }
      else {
        $(this).css("border-color", "red");
      }
    });


    $("#submit").on("click",function(e){

      var name = $("[name='pec_name']");
      var desc = $("[name='pec_desc']");

      if (name.val().length === 0) {
        toastr.error("Pre Existing Condition is Required");
        e.preventDefault(e);
        name.css("border-color", "red");
      }

      if (desc.val().length === 0) {
        toastr.error("Description is Required");
        e.preventDefault(e);
        desc.css("border-color", "red");
      }

    });

  </script>

@endsection
















{{--  --}}
