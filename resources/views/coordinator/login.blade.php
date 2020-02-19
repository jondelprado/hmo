
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/inputmask/jquery.inputmask.bundle.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/adminlte.min.js')}}" charset="utf-8"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style media="screen">



      body, .card-header, .card-footer{
        background: linear-gradient(89deg, #ffffff, #aeb5f3, #bfeaa7);
        background-size: 600% 600%;

        -webkit-animation: AnimationName 30s ease infinite;
        -moz-animation: AnimationName 30s ease infinite;
        animation: AnimationName 30s ease infinite;
      }


      @-webkit-keyframes AnimationName {
          0%{background-position:0% 50%}
          50%{background-position:100% 50%}
          100%{background-position:0% 50%}
      }
      @-moz-keyframes AnimationName {
          0%{background-position:0% 50%}
          50%{background-position:100% 50%}
          100%{background-position:0% 50%}
      }
      @keyframes AnimationName {
          0%{background-position:0% 50%}
          50%{background-position:100% 50%}
          100%{background-position:0% 50%}
      }

      .center{
        margin-top: 10%;
        margin-left: auto;
        margin-right: auto;
        /* margin: auto; */
        width: 90%;
      }

      .register_button:hover{
        cursor: pointer;
        color: blue;
      }

      .cancel_button{
        display: none;
        color: red;
      }

      .cancel_button:hover{
        cursor: pointer;
      }


    </style>

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

      @include('include.messages')

        <div class="center">
          <div class="row">

            <div style="display:none;" class="col-lg-6 registration_field">
              <div class="card">

                <div class="card-header text-center">
                  <h3>Registration Form</h3>
                </div>

                <div class="card-body">

                    <div class="form-group">

                      <div class="row">

                        <div class="col-lg-12">
                          <p style="color: blue;" class="text-right">
                            <i>Must Provide Employee ID for verification before proceeding</i>
                          </p>

                        </div>

                        <div class="col-lg-12">
                          <label>Employee ID:</label>
                          <label id="found" style="color: green; display: none;">Record Found!</label>
                          <label id="name" style="display: none;"></label>
                          <label id="error" style="color: red; display: none;">No Record Found!</label>

                          <div class="input-group">
                            <input type="text" id="coordinator_empid" class="form-control">
                            <span class="input-group-append">
                              <button type="button" id="check_empid" class="btn btn-info">Check</button>
                            </span>
                          </div>

                        </div>

                    </div>

                  </div>
                  <div style="display:none;" class="fields">
                    <form action="{{action('CoordinatorController@coordinatorCredentials')}}" method="post">.
                      {{csrf_field()}}
                      <div class="row">

                          <div class="col-lg-12">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="new_coordinator_username" value=""><br>
                          </div>

                          <div class="col-lg-6">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="new_coordinator_temp_password" value=""><br>
                          </div>

                          <div class="col-lg-6">
                            <label>Confirm Password:</label>
                            <input type="password" class="form-control" name="new_coordinator_password" value=""><br>
                          </div>

                          <input type="hidden" name="coordinator_id" value="">

                          <div class="col-lg-12 text-center">
                            <input id="register" type="submit" class="btn btn-success" value="Register">
                          </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>
            </div>

            <div class="col-lg-6 text-center banner">
              <img width="60%" height="60%"  src="{{asset('img/logo.png')}}" alt=""><br>
              <h3>Health Maintenance Organization</h3>
              <h5><i>Coordinator</i></h5>
            </div>

            <div class="col-lg-6">

                <div class="card rounded">
                  <div class="card-header text-center">
                      <h3>Coordinator Login Page</h3>
                  </div>

                  <div class="card-body">
                    <div class="col-lg-12">

                      {!! Form::open(['action' => 'CoordinatorController@coordinatorLogin', 'method' => 'post']) !!}

                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="coordinator_user" placeholder="Input Username"><br>
                          <label>Password</label>
                          <input type="password" class="form-control" name="coordinator_password" placeholder="Input Password"><br>

                          <div class="text-center">
                            <input type="submit" id="login" class="btn btn-success" value="Login"><br><br>
                            {{-- <button id="login" type="button" class="btn btn-success">Login</button><br><br> --}}
                            {{-- <button type="button" class="btn btn-primary">Register</button> --}}
                            <p class="register_button">Dont have account yet? Click here!</p>
                            <p class="cancel_button">Cancel Registration</p>
                          </div>
                        </div>

                      {!! Form::close() !!}

                    </div>
                  </div>

                  <div class="card-footer text-center">
                    © 2018-2019 Health Maintenance Organization
                  </div>

                </div>

              </div>

            </div>

          </div>
        </div>

    </div>
</body>
</html>


<script>

  $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

  });

  $("#login").on("click", function(e){

    var username = $("[name='coordinator_user']").val();
    var password = $("[name='coordinator_password']").val();

    // if (username.length != 0 && password.length != 0) {
    //
    //   $.ajax({
    //     type: "post",
    //     url: "http://localhost/hmo/public/coordinator/login",
    //     data: {username:username, password:password},
    //     dataType: "json",
    //     success:function(data){
    //
    //       // if (data.length != 0) {
    //       //   window.location = "http://localhost/hmo/public/coordinator";
    //       // }
    //       // else {
    //       //   swal.fire({
    //       //     title: "Login Failed",
    //       //     text: "Account Does Not Exist!",
    //       //     type: "error"
    //       //   });
    //       // }
    //
    //     }
    //   });
    //
    // }

    if (username.length == 0) {

      e.preventDefault();
      swal.fire({
        title: "Empty Username",
        text: "Username is Required!",
        type: "error"
      });

    }

    if (password.length == 0) {

      e.preventDefault();
      swal.fire({
        title: "Empty Password",
        text: "Password is Required!",
        type: "error"
      });

    }

    if (username.length == 0 && password.length == 0) {

      e.preventDefault();
      swal.fire({
        title: "Empty Username and Password",
        text: "Please provide your Username and Password!",
        type: "error"
      });

    }

  });

  $("#check_empid").on("click", function(){

    var empid = $("#coordinator_empid").val();

    $.ajax({
      type: "post",
      url: 'http://localhost/hmo/public/coordinator/register',
      data:{empid:empid},
      dataType: "json",
      success:function(data){

        if (data.length != 0) {

          $("#error").hide();
          $("#found").fadeIn();
          $("#name").fadeIn();
          $("#coordinator_empid").css("border-color", "green");
          $("[name='new_coordinator_password']").css('border-color', '');
          $(".fields").fadeIn();

          $.each(data, function(i){
            $("#name").html('('+data[i].firstname.toUpperCase()+" "+data[i].lastname.toUpperCase()+')');
            $("[name='coordinator_id']").val(data[i].id);
          });

        }
        else {
          $("#found").hide();
          $("#name").hide();
          $("#error").fadeIn();
          $("[name='new_coordinator_username']").val("");
          $("[name='new_coordinator_password']").val("");
          $("[name='new_coordinator_temp_password']").val("");
          $("[name='new_coordinator_password']").css('border-color', '');
          $("[name='coordinator_id']").val("");
          $("#coordinator_empid").css("border-color", "red");
          $(".fields").fadeOut();
        }

      }
    });

  });

  $(".register_button").on("click", function(){

    $(".registration_field").fadeIn();
    $(".banner").hide();
    $(".register_button").hide();
    $(".cancel_button").fadeIn();

  });

  $(".cancel_button").on("click", function(){

    $(".banner").fadeIn();
    $(".registration_field").hide();
    $(".register_button").fadeIn();
    $(".cancel_button").hide();
    $(".fields").hide();

    $("[name='new_coordinator_empid']").val("");
    $("[name='new_coordinator_username']").val("");
    $("[name='new_coordinator_temp_password']").val("");
    $("[name='new_coordinator_password']").val("");

  });

  // $("[name='new_coordinator_empid']").on("keyup", function(){
  //
  //   if ($(this).val().length != 0) {
  //     if ($(this).val().length == 5) {
  //       if ($(this).val() == "admin") {
  //         $(".fields").fadeIn();
  //       }
  //       else {
  //         Swal.fire({
  //           title: "Employee ID not found",
  //           text: "Sorry, we did not found any matching Employee ID",
  //           type: "error",
  //         });
  //       }
  //     }
  //   }
  //   else {
  //     $(".fields").fadeOut();
  //   }
  //
  // });

  $("[name='new_coordinator_password']").on("keyup", function(){

    var temp_pass = $("[name='new_coordinator_temp_password']").val();

    if ($(this).val() == temp_pass) {
      $(this).css('border-color', 'green');
    }
    else {
      $(this).css('border-color', 'red');
    }

  });

  $("#register").on("click", function(){

    var temp_pass = $("[name='new_coordinator_temp_password']").val();
    var pass =  $("[name='new_coordinator_password']").val();

    if (pass != temp_pass) {
      Swal.fire({
        title: "Password doesn't match",
        text: "Please match the password you provide before proceeding.",
        type: "error",
      });
    }

  });

</script>








{{--  --}}
