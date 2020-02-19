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
                @foreach ($coordinators as $coordinator)
                  @php
                    $fullname = $coordinator->lastname.", ".$coordinator->firstname." ".$coordinator->middlename;
                  @endphp
                  <tr>
                    <td>{{strtoupper($fullname)}}</td>
                    <td>{{$coordinator->employee_id}}</td>
                  </tr>
                @endforeach
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

            <form action="{{action('CoordinatorController@store')}}" method="post">
              {{csrf_field()}}
            {{-- {!! Form::open(['action' => 'CoordinatorController@store', 'method' => 'post']) !!} --}}
              <div class="form-group">

                @include('include.note')<br>

                <div class="row">

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>First Name</label>
                    <input type="text" class="form-control" name="coordinator_first" placeholder="Input First Name"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="coordinator_last" placeholder="Input Last Name"><br>
                  </div>

                  <div class="col-lg-4">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="coordinator_middle" placeholder="Input Middle Name"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="coordinator_bday"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Age</label>
                    <input type="text" class="form-control" name="coordinator_age" placeholder="Input Age"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Gender</label>
                    <select class="form-control" name="coordinator_gender">
                      <option value="">--Select Gender--</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select><br>
                  </div>

                  <div class="col-lg-12">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Address</label>
                    <input type="text" class="form-control" name="coordinator_address" placeholder="Input Address"><br>
                  </div>

                  <div class="col-lg-4">
                    <label>Telephone</label>
                    <input type="text" class="form-control" name="coordinator_telephone" placeholder="Input Telephone"><br>
                  </div>

                  <div class="col-lg-4">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="coordinator_mobile" placeholder="Input Mobile"><br>
                  </div>

                  <div class="col-lg-4">
                    <label>Email</label>
                    <input type="email" class="form-control" name="coordinator_email" placeholder="Input Email">
                  </div>

                  <div class="col-lg-12">
                    <i class="fas fa-asterisk ast"></i>
                    <label>Temporary Password</label>
                    {{-- <input type="text" class="form-control" name="coordinator_password" placeholder="Input Password"> --}}
                    <div class="input-group">
                      <input type="text" name="coordinator_password" class="form-control">
                      <span class="input-group-append">
                        <button type="button" id="generate_pass" class="btn btn-success">Generate</button>
                      </span>
                    </div>
                  </div>

                  <input type="hidden" name="coordinator_user" value="0">
                  <input type="hidden" name="coordinator_empid" value="">

                </div>

              </div>



          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/utilities/coordinator" class="btn btn-danger">Back</a>
          </div>

        </form>
        {{-- {!! Form::close() !!} --}}
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
        swal.fire({
          title: "Empty Field(s)!",
          text: "Please fill all required fields.",
          type: "error"
        });
      }

    });

    $("#generate_pass").on("click", function(e){

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
            first_initial.push(split_first[i].charAt(0));
          }

        }
        else {
          first_initial.push(firstname.charAt(0));
        }

        if (/\s/.test(lastname)) {

          var split_last = lastname.split(' ');

          for (var i = 0; i < split_last.length; i++) {
            last_initial.push(split_last[i].charAt(0));
          }

        }
        else {
          last_initial.push(lastname.charAt(0));
        }

        emp_bday = $("[name='coordinator_bday']").val().split('-');

        temp_pass = first_initial.join('')+''+last_initial.join('')+''+emp_bday.join('');

        $("[name='coordinator_password']").val(temp_pass);

      }
      else {
        e.preventDefault();
        swal.fire({
          title: "Cannot Generate Password!",
          text: "Please put First Name, Last Name and Birthdate in order to generate Password.",
          type: "error"
        });
      }

    });


  </script>

@endsection












{{--  --}}
