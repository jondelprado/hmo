@extends('layouts.coordinator')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Doctor</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Claims</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/claims/doctor">Doctor</a>
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

          <div class="card-header bg-success">
            <h4>Create Doctor Claim</h4>
          </div>

          <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

              <li class="nav-item">
                <a class="nav-link info_link active" id="custom-content-below-info-tab" data-toggle="pill"
                    href="#custom-content-below-info" role="tab" aria-controls="custom-content-below-info" aria-selected="true">Information</a>
              </li>

              <li class="nav-item">
                <a class="nav-link patient_link " id="custom-content-below-patient-tab" data-toggle="pill"
                    href="#custom-content-below-patient" role="tab" aria-controls="custom-content-below-patient" aria-selected="true">Patient</a>
              </li>

            </ul>

            {!! Form::open(['action' => 'DoctorController@store', 'method' => 'post']) !!}
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade active show" id="custom-content-below-info" role="tabpanel" aria-labelledby="custom-content-below-info-tab">
                <div class="container-fluid">


                  <div style="margin-top: 5%;" class="form-group">

                    @include('include.note')<br>

                    <div class="row">

                      <div class="col-lg-4">
                        <i class="fa fa-asterisk ast"></i>
                        <label>First Name</label>
                        <input type="text" class="form-control info_field" name="doctor_first" placeholder="Input First Name"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fa fa-asterisk ast"></i>
                        <label>Last Name</label>
                        <input type="text" class="form-control info_field" name="doctor_last" placeholder="Input Last Name"><br>
                      </div>

                      <div class="col-lg-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="doctor_middle" placeholder="Input Middle Name"><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fa fa-asterisk ast"></i>
                        <label>Hospital Name</label>
                        <input type="text" class="form-control info_field" name="hospital_name" placeholder="Input Hospital Name"><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fa fa-asterisk ast"></i>
                        <label>Hospital Address</label>
                        <input type="text" class="form-control info_field" name="hospital_address" placeholder="Input Hospital Address"><br>
                      </div>

                      <div class="col-lg-6">
                        <label>Telephone</label>
                        <input type="text" class="form-control" name="doctor_telephone" placeholder="Input Telephone"><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fa fa-asterisk ast"></i>
                        <label>Mobile</label>
                        <input type="text" class="form-control info_field" name="doctor_mobile" placeholder="Input Mobile">
                      </div>

                    </div>

                  </div>

                </div>
              </div>

              <div class="tab-pane fade" id="custom-content-below-patient" role="tabpanel" aria-labelledby="custom-content-below-patient-tab">
                <div class="container-fluid">

                  <div style="margin-top: 5%;" class="form-group">

                    @include('include.note')<br>

                    <div class="row">

                      <div class="col-lg-6">

                        <i class="fa fa-asterisk ast"></i>
                        <label>First Name</label>
                        <input type="text" class="form-control temp_field" name="temp_first" placeholder="Input Name"><br>

                        <i class="fa fa-asterisk ast"></i>
                        <label>Last Name</label>
                        <input type="text" class="form-control temp_field" name="temp_last" placeholder="Input Last Name"><br>

                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="temp_middle" placeholder="Input Middle Name"><br>

                        <i class="fa fa-asterisk ast"></i>
                        <label>Card ID</label>
                        <input type="text" class="form-control temp_field" name="temp_card" placeholder="Input Card ID"><br>

                        <i class="fa fa-asterisk ast"></i>
                        <label>Service Done</label>
                        <select style="width: 100%;" class="services_list form-control temp_field" multiple="multiple" name="temp_service">
                          <option></option>
                        </select><br><br>

                        <i class="fa fa-asterisk ast"></i>
                        <label>Amount</label>
                        <input type="text" class="form-control temp_field" name="temp_amount" placeholder="Input Amount"><br>

                        <div class="col-lg-12 text-center">
                          <button id="add" type="button" class="btn btn-primary">Add</button>
                          <button id="clear" type="button" class="btn btn-danger">Clear</button><br><br>
                        </div>

                      </div>

                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header bg-info">
                            <h5>Patient List</h5>
                          </div>

                          <div style="height: 490px; border: 1px solid #61b09a; overflow-y: auto;" class="card-body patient_container">

                            <div class="row patient_list">

                            </div>

                          </div>

                        </div>

                        <input type="hidden" name="claim_id" value="">

                        <div class="col-lg-12 text-center">
                          <input type="submit" class="btn btn-success" name="btn_submit" value="Submit">
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>


            </div>

            {!! Form::close() !!}


          </div>

        </div>

      </div>

    </div>

  </div>

  <script>

    var index_patient = 1;

    function appendList(){

      index_patient += 1;

      var name = $("[name='temp_last']").val()+', '+$("[name='temp_first']").val()+' '+$("[name='temp_middle']").val();
      var fname = $("[name='temp_first']").val();
      var lname = $("[name='temp_last']").val();
      var mname = $("[name='temp_middle']").val();
      var card = $("[name='temp_card']").val();
      var service = $("[name='temp_service']").val();
      var amount = $("[name='temp_amount']").val();
      var service_list = "";

      $.each(service, function(i){

        service_list += '<p>'+service[i]+'</p>';

      });

      var patient_id = patientID(card);

      var html = '<div class="col-lg-12 patient_'+index_patient+'"><div class="row">'
                  +'<div class="col-lg-6"><p><b>Name</b></p></div><div class="col-lg-6"><p>'+name+'</p></div>'
                  +'<div class="col-lg-6"><p><b>Card ID</b></p></div><div class="col-lg-6"><p>'+card+'</p></div>'
                  +'<div class="col-lg-6"><p><b>Service Done</b></p></div><div class="col-lg-6">'+service_list+'</div>'
                  +'<div class="col-lg-6"><p><b>Amount</b></p></div><div class="col-lg-6"><p>'+amount+'</p></div>'
                  +'<div class="col-lg-12 text-center"><button id="patient_'+index_patient+'" class="btn btn-danger btn-xs remove_patient">Remove</button></div>'
                  +'<div class="col-lg-12"><hr></div>'
                  +'<input type="hidden" name="patient_first[]" value="'+fname+'">'
                  +'<input type="hidden" name="patient_last[]" value="'+lname+'">'
                  +'<input type="hidden" name="patient_middle[]" value="'+mname+'">'
                  +'<input type="hidden" name="patient_card[]" value="'+card+'">'
                  +'<input type="hidden" name="patient_service[]" value="'+service+'">'
                  +'<input type="hidden" name="patient_amount[]" value="'+amount+'">'
                  +'<input type="hidden" name="patient_id[]" value="'+patient_id+'">'
                  +'</div></div>';

      $(".patient_list").append(html);

      $("[name='temp_first']").val("");
      $("[name='temp_last']").val("");
      $("[name='temp_middle']").val("");
      $("[name='temp_card']").val("");
      $("[name='temp_service']").val("").trigger("change");
      $("[name='temp_amount']").val("");

      $(".remove_patient").on("click", function(){
        var patient_id = $(this).attr('id');
        $('.'+patient_id).remove();
      });

    }

    function claimID(){

      var current_date = new Date();

      var claim_id = "DCL-"+(current_date.getMonth()+1) +""
                + current_date.getDate() + ""
                + current_date.getFullYear() + "-"
                + current_date.getHours() + ""
                + current_date.getMinutes() + ""
                + current_date.getSeconds();

      // console.log(claim_id);

      $("[name='claim_id']").val(claim_id);

    }

    function patientID(card){

      var current_date = new Date();
      var patient_card = card;

      var patient_id = "PTN-"+(current_date.getMonth()+1) +""
                + current_date.getDate() + ""
                + current_date.getFullYear() + "-"
                + patient_card;

      console.log(patient_id);

      return patient_id;

    }

    function checkDoctorField(e){

      var empty_counter = 0;
      var empty_field = "";

      $(".info_field").each(function(){

        var input_name = $(this).attr('name');
        var input_placeholder = $(this).attr('placeholder');
        var input_value = $(this).val();

        if (input_value == "") {

          empty_counter++;
          empty_field += input_placeholder.replace("Input", "")+'<br>';

          $("[name="+input_name+"]").css("border-color", "red");
          $(".info_link").css("color", "red");


        }
        else {

          $("[name="+input_name+"]").css("border-color", "lightgreen");
          $(".info_link").removeAttr("style");

        }

      });

      if ($(".patient_list").html().trim().length <= 0) {

        empty_counter++;
        empty_field += 'Patient List<br>';

        $(".patient_container").css("border-color", "red");
        $(".patient_link").css("color", "red");

      }
      else {

        $(".patient_container").css("border-color", "#61b09a");
        $(".patient_link").removeAttr("style");

      }

      if (empty_counter >= 1) {


        Swal.fire({
          title: "Empty Field(s) not Allowed!",
          html: "Please fill following empty field(s): <br>"+empty_field,
          type: "error"
        });

        e.preventDefault();
      }
      else {

        claimID();

      }



    }

    function checkPatientField(){

      var empty_counter = 0;
      var empty_field = "";

      $(".temp_field").each(function(){

        var input_name = $(this).attr('name');
        var input_value = $(this).val();

        if (input_value == "") {

          empty_counter++;
          empty_field += input_name.replace("temp_", "")+'<br>';

          $("[name="+input_name+"]").css("border-color", "red");

          if (input_name == "temp_service") {

            $(".select2-selection").css("border-color", "red");

          }

        }
        else {

          $("[name="+input_name+"]").css("border-color", "lightgreen");

          if (input_name == "temp_service") {

            $(".select2-selection").css("border-color", "lightgreen");

          }

        }


      });

      if (empty_counter >= 1) {
        Swal.fire({
          title: "Empty Field(s) not Allowed!",
          html: "Please fill following empty field(s): <br>"+empty_field,
          type: "error"
        });
      }
      else {

        appendList();

      }

    }


    $("#add").on("click", function(){

      checkPatientField();

    });

    $("[name='btn_submit']").bind("click", checkDoctorField);

  </script>

@endsection









{{--  --}}
