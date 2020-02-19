@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Coordinator</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Utilities</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/utilities/coordinator">Coordinator</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-5">

        <div class="card">

          <div class="card-body">
            <table class="table table-bordered table-hover transaction_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Employee ID</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $fullname = $coordinator->lastname.", ".$coordinator->firstname." ".$coordinator->middlename;
                @endphp
                <tr>
                  <td>{{strtoupper($fullname)}}</td>
                  <td>{{$coordinator->employee_id}}</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>

      </div>

      <div class="col-lg-7">

        <div class="card">

          <div class="card-header bg-primary">
            <h4>Create Coordinator</h4>
          </div>

          <div class="card-body">

            {{-- <form action="{{action('CoordinatorController@store')}}" method="post"> --}}
              {{-- {{csrf_field()}} --}}
            {!! Form::open(['action' => ['CoordinatorController@update', $coordinator->id], 'method' => 'post']) !!}
              <div class="form-group">

                @include('include.note')<br>

                <div class="row">

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>First Name</label>
                    <input type="text" class="form-control" name="coordinator_first" placeholder="Input First Name" value="{{$coordinator->firstname}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="coordinator_last" placeholder="Input Last Name" value="{{$coordinator->lastname}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="coordinator_middle" placeholder="Input Middle Name" value="{{$coordinator->middlename}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="coordinator_bday" value="{{$coordinator->bday}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Age</label>
                    <input type="text" class="form-control" name="coordinator_age" placeholder="Input Age" value="{{$coordinator->age}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Gender</label>

                    @php
                      $male = "";
                      $female = "";

                      if ($coordinator->gender == "Male") {
                        $male = "selected";
                      }
                      else {
                        $female = "selected";
                      }
                    @endphp

                    <select class="form-control" name="coordinator_gender">
                      <option value="">--Select Gender--</option>
                      <option value="Male" {{$male}}>Male</option>
                      <option value="Female" {{$female}}>Female</option>
                    </select><br>
                  </div>

                  <div class="col-lg-12">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Address</label>
                    <input type="text" class="form-control" name="coordinator_address" placeholder="Input Address" value="{{$coordinator->address}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <label>Telephone</label>
                    <input type="text" class="form-control" name="coordinator_telephone" placeholder="Input Telephone" value="{{$coordinator->telephone}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="coordinator_mobile" placeholder="Input Mobile" value="{{$coordinator->mobile}}"><br>
                  </div>

                  <div class="col-lg-4">
                    <label>Email</label>
                    <input type="email" class="form-control" name="coordinator_email" placeholder="Input Email" value="{{$coordinator->email}}">
                  </div>

                  <input type="hidden" name="coordinator_empid" value="{{$coordinator->employee_id}}">
                  <input type="hidden" name="_method" value="PUT">

                </div>

              </div>



          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/utilities/coordinator" class="btn btn-danger">Back</a>
          </div>

        {{-- </form> --}}
        {!! Form::close() !!}
        </div>

      </div>

    </div>

  </div>

  <script>

    $("#submit").on("click", function(e){

      var firstname = $("[name='coordinator_first']").val();
      var lastname = $("[name='coordinator_last']").val();
      var bday = $("[name='coordinator_bday']").val();

      if (firstname != "" && lastname != "" && bday != "") {

        var last_initial = [];
        var first_initial = [];
        var emp_id;
        var emp_bday;

        if (/\s/.test(firstname)) {

          var split_first = firstname.split(' ');

          for (var i = 0; i < split_first.length; i++) {
            first_initial.push(split_first[i].charAt(0).toUpperCase());
          }

        }
        else {
          first_initial.push(firstname.charAt(0).toUpperCase());
        }

        if (/\s/.test(lastname)) {

          var split_last = lastname.split(' ');

          for (var i = 0; i < split_last.length; i++) {
            last_initial.push(split_last[i].charAt(0).toUpperCase());
          }

        }
        else {
          last_initial.push(lastname.charAt(0).toUpperCase());
        }

        emp_bday = $("[name='coordinator_bday']").val().split('-');

        emp_id = first_initial.join('')+''+last_initial.join('')+'-'+emp_bday.join('');

        $("[name='coordinator_empid']").val(emp_id);

        console.log(emp_id);

      }
      else {
        e.preventDefault();
        alert("empty");
      }

    });


  </script>

@endsection












{{--  --}}
