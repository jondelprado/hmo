@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Member</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaction</li>
            <li class="breadcrumb-item">Contract</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/transaction/contract/member">Member</a>
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
                  <th>Entry Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($members as $member)
                  @php
                    $fullname = $member->lastname.", ".$member->firstname." ".$member->middlename;
                  @endphp
                  <tr>
                    <td>{{strtoupper($fullname)}}</td>
                    <td>{{date('M j, Y \- g:ia', strtotime($member->created_at))}}</td>
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
            <h4>Create Member</h4>
          </div>

          <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-info-tab" data-toggle="pill"
                    href="#custom-content-below-info" role="tab" aria-controls="custom-content-below-info" aria-selected="true">Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                    href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Plan Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                    href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Pre Existing Condition</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill"
                    href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Dependent</a>
              </li>
            </ul>

            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade active show" id="custom-content-below-info" role="tabpanel" aria-labelledby="custom-content-below-info-tab">
                <div class="container-fluid">
                  {!! Form::open(['action' => 'MemberController@store', 'method' => 'POST']) !!}
                  <div style="margin-top: 5%;" class="form-group">
                    @include('include.note')
                    <div class="row">

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>First Name</label>
                        <input type="text" class="form-control" name="member_first" placeholder="Input First Name"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="member_last" placeholder="Input Last Name"><br>
                      </div>

                      <div class="col-lg-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="member_middle" placeholder="Input Middle Name"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Birthdate</label>
                        <input type="date" class="form-control" name="member_bday"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Age</label>
                        <input type="text" class="form-control" name="member_age" placeholder="Input Member Age"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Gender</label><br>
                        <div class="icheck-success d-inline">
                          <input type="radio" name="member_gender" value="Male" id="radio1">
                          <label for="radio1">Male</label>
                        </div>
                        <div class="icheck-success d-inline check_div">
                          <input type="radio" name="member_gender" value="Female" id="radio2">
                          <label for="radio2">Female</label>
                        </div><br><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Height</label>
                        <input type="text" class="form-control" name="member_height" placeholder="Feet"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Weight</label>
                        <input type="text" class="form-control" name="member_weight" placeholder="Kilogram"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Civil Status</label>
                        <select class="form-control" name="member_civil">
                          <option value="">Select Civil Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Separated">Separated</option>
                        </select><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Address</label>
                        <input type="text" class="form-control" name="member_address" placeholder="Input Member Address"><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Occupation</label>
                        <input type="text" class="form-control" name="member_occupation" placeholder="Input Member Occupation"><br>
                      </div>

                      <div class="col-lg-4">
                        <label>Telephone</label>
                        <input type="text" class="form-control" name="member_telephone" placeholder="Input Member Telephone"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="member_mobile" placeholder="Input Member Mobile"><br>
                      </div>

                      <div class="col-lg-4">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Email</label>
                        <input type="email" class="form-control" name="member_email" placeholder="Input Member Email">
                      </div>

                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <div class="container-fluid">
                  <div style="margin-top: 5%;" class="form-group">
                    <div class="row">

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Membership Type</label><br>
                        <select style="width: 100%;" class="form-control select2" name="member_membership">
                          <option value="None">--Select Type--</option>
                          @foreach ($memberships as $membership)
                            <option value="{{$membership->id}}|{{$membership->type}}|{{$membership->interest}}">{{$membership->type}}</option>
                          @endforeach
                        </select><br><br>

                        <input type="hidden" name="member_interest" value="">

                      </div>

                      <div class="col-lg-6">
                        <label>End of Contract</label>
                        @php
                          $endo = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));
                        @endphp
                        <input type="date" class="form-control" name="member_endo" value="{{$endo}}">
                      </div>

                      <div style="display: none;" class="col-lg-12 company_field">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Company</label><br>
                        <select style="width: 100%;" class="form-control select2" name="member_company">

                        </select><br><br>
                      </div>

                      <div class="col-lg-12">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Plan</label>
                        <select style="width: 100%;" class="form-control select2" name="member_plan">

                        </select><br><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Maximum Benefit Limit</label>
                        <input type="text" class="form-control" name="member_benefit" value=""><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Annual Payment</label>
                        <input type="text" class="form-control" name="member_annual" value=""><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Payment Frequency</label>
                        <select style="width: 100%;" class="form-control select2" name="member_frequency">
                          <option value="None">--Select Frequency--</option>
                          <option value="Monthly|12">Monthly</option>
                          <option value="Quarterly|3">Quarterly</option>
                          <option value="Semi-Annual|2">Semi-Annual</option>
                          <option value="Annually|1">Annually</option>
                        </select><br><br>
                      </div>

                      <div class="col-lg-6">
                        <i class="fas fa-asterisk ast"></i>
                        <label>Amount to be Paid</label>
                        <input type="text" class="form-control" name="member_payment" value="">
                      </div>


                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                <div class="container-fluid">
                  <div style="margin-top: 5%;" class="form-group">
                    <div class="row">

                      <div class="col-lg-12">
                        <label>Pre Existing Condition(s)</label>
                        <select class="duallistbox" name="member_pec[]" multiple>
                          @foreach ($pecs as $pec)
                            <option value="{{$pec->id}}">{{$pec->condition}}</option>
                          @endforeach
                        </select>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                <div class="container-fluid">
                  <div style="margin-top: 5%;" class="form-group">
                    <div class="row">

                      <div class="col-lg-6">

                        <div class="col-lg-12">
                          <label>Name</label>
                          <input type="text" class="form-control" name="temp_name"><br>
                        </div>

                        <div class="col-lg-12">
                          <label>Birthdate</label>
                          <input type="date" class="form-control" name="temp_bday"><br>
                        </div>

                        <div class="col-lg-12">
                          <label>Relationship</label>
                          <input type="text" class="form-control" name="temp_relationship"><br>
                        </div>

                        <div class="col-lg-12">
                          <label>Civil Status</label><br>
                          <select style="width: 100%;" class="form-control select2" name="temp_civil"><br>
                            <option value="">Select Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                          </select><br><br>
                        </div>

                        <div class="col-lg-12 text-center">
                          <button id="add" type="button" class="btn btn-success">Add</button>
                          <button id="clear" type="button" class="btn btn-danger">Clear</button><br><br>
                        </div>

                      </div>

                      <div class="col-lg-6">

                        <div class="card">
                          <div class="card-header bg-info">
                            <h6>Dependent List</h6>
                          </div>
                          <div style="height: 300px; border: 1px solid #61b09a; overflow-y: auto;" class="card-body">
                            <div class="row dependent_list">

                            </div>
                          </div>
                        </div>

                        <input type="hidden" name="current_date" value="{{date("Ymd")}}">
                        <input type="hidden" name="dependent_id" value="">

                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/transaction/contract/member" class="btn btn-danger">Back</a>
          </div>

          {!! Form::close() !!}

        </div>
      </div>

    </div>

  </div>

  <script>

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    //MEMBERSHIP TYPE SELECTION

    $("[name='member_membership']").on("change", function(){

      $("[name='member_frequency']").val("None").trigger("change");
      $("[name='member_company']").find('option').remove().end().append('<option value="">--Select Company--</option>');
      $("[name='member_plan']").find('option').remove().end().append('<option value="">--Select Plan--</option>');
      $("[name='member_benefit']").val("");
      $("[name='member_annual']").val("");
      $("[name='member_payment']").val("");

      var membership_values = $(this).val().split('|');

      if (membership_values[1] == "Corporate") {

        $("[name='member_interest']").val(membership_values[2]);

        $(".company_field").fadeIn();

        $.ajax({
          type: "post",
          url: "http://localhost/hmo/public/transaction/contract/member/create/membership",
          data: {membership_type:membership_values[1], membership_id:membership_values[0]},
          dataType: "json",
          success:function(data){
            $("[name='member_company']").find('option').remove().end().append('<option value="">--Select Company--</option>');
            $.each(data, function(i){
              $("[name='member_company']").append(new Option(data[i].name, data[i].id+'|'+data[i].name+'|'+data[i].plan_id));
            });
          }
        });

      }
      else if(membership_values[1] != "None"){

        $("[name='member_interest']").val(membership_values[2]);

        $(".company_field").fadeOut();

        $.ajax({
          type: "post",
          url: "http://localhost/hmo/public/transaction/contract/member/create/membership",
          data: {membership_type:membership_values[1], membership_id:membership_values[0]},
          dataType: "json",
          success:function(data){
            $("[name='member_plan']").find('option').remove().end().append('<option value="">--Select Plan--</option>');
            $.each(data, function(i){
              $("[name='member_plan']").append(new Option(data[i].plan, data[i].benefit+'|'+data[i].annual+'|'+data[i].id));;
            });
          }
        });
      }

    });

    //COMPANY SELECTION (IF MEMBERSHIP TYPE IS "CORPORATE")

    $("[name='member_company']").on("change", function(){

      var company_values = $(this).val().split('|');
      var company_plan = company_values[2];

      $.ajax({
        type: "post",
        url: "http://localhost/hmo/public/transaction/contract/member/create/company-plan",
        data: {company_plan:company_plan},
        dataType: "json",
        success:function(data){
          $("[name='member_plan']").find('option').remove().end().append('<option value="">--Select Plan--</option>');
          $.each(data, function(i){
            $("[name='member_plan']").append(new Option(data[i].plan, data[i].benefit+'|'+data[i].annual+'|'+data[i].id));
          });
        }
      });


    });

    //FINAL PAYMENT COMPUTATION WITH INTEREST ADDED BASED ON MEMBERSHIP TYPE

    $("[name='member_plan']").on("change", function(){

      var plan_values = $(this).val().split('|');
      var plan_benefit = plan_values[0];
      var plan_annual = plan_values[1];

      $("[name='member_benefit']").val(plan_benefit);
      $("[name='member_annual']").val(plan_annual);

    });

    $("[name='member_frequency']").on("change", function(){

      var frequency_values = $(this).val().split('|');
      var frequency = frequency_values[1];
      var type = frequency_values[0];
      var interest = $("[name='member_interest']").val();
      var annual = $("[name='member_annual']").val();

      var charge = (annual * interest) / 100;
      var payment = (annual / frequency) + charge;

      $("[name='member_payment']").val(payment);


    });


    //ADD DEPENDENT

    var index_dependent = 1;

    $("#add").on("click", function(){

      var name = $("[name='temp_name']").val();
      var bday = $("[name='temp_bday']").val();
      var relationship = $("[name='temp_relationship']").val();
      var civil = $("[name='temp_civil']").val();
      index_dependent +=1;

      var html = '<div class="col-lg-12 dependent_'+index_dependent+'"><div class="row">'
                  +'<div class="col-lg-6"><p><b>Name</b></p></div><div class="col-lg-6"><p>'+name+'</p></div>'
                  +'<div class="col-lg-6"><p><b>Birthdate</b></p></div><div class="col-lg-6"><p>'+bday+'</p></div>'
                  +'<div class="col-lg-6"><p><b>Relationship</b></p></div><div class="col-lg-6"><p>'+relationship+'</p></div>'
                  +'<div class="col-lg-6"><p><b>Civil Status</b></p></div><div class="col-lg-6"><p>'+civil+'</p></div>'
                  +'<div class="col-lg-12 text-center"><button id="dependent_'+index_dependent+'" class="btn btn-danger btn-xs remove_dependent">Remove</button></div>'
                  +'<div class="col-lg-12"><hr></div>'
                  +'<input type="hidden" name="dependent_name[]" value="'+name+'">'
                  +'<input type="hidden" name="dependent_bday[]" value="'+bday+'">'
                  +'<input type="hidden" name="dependent_relationship[]" value="'+relationship+'">'
                  +'<input type="hidden" name="dependent_civil[]" value="'+civil+'">'
                  +'</div></div>';


      $(".dependent_list").append(html);

      $("[name='temp_name']").val("");
      $("[name='temp_bday']").val("");
      $("[name='temp_relationship']").val("");
      $("[name='temp_civil']").val("").trigger("change");

      $(".remove_dependent").on("click", function(){
        var dependent_id = $(this).attr('id');
        $('.'+dependent_id).remove();

      });

    });


    //CLEAR ALL DEPENDENTS
    $("#clear").on("click", function(){
      Swal.fire({
        title: "Clear List",
        text: "Are you sure you want to clear all?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
      }).then((result) => {
        if (result.value) {
          $(".dependent_list").empty();
        }
      })
    });


    //GENERATE ID FOR MEMBER AND HIS/HER DEPENDENTS
    function makeid() {
      var currentDate = $("[name='current_date']").val();
      var result           = '';
      var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      var charactersLength = characters.length;
      for ( var i = 0; i < 5; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      var key = result+'_'+currentDate;
      $("[name='dependent_id']").val(key);
    }

    $("#submit").on("click", function(e){

      if ($(".dependent_list").children().length > 0) {

        makeid();

        var name = [];
        var bday = [];
        var relationship = [];
        var civil = [];
        var id = $("[name='dependent_id']").val();

        $("[name='dependent_name[]']").each(function(){
          name.push($(this).val());
        });

        $("[name='dependent_bday[]']").each(function(){
          bday.push($(this).val());
        });

        $("[name='dependent_relationship[]']").each(function(){
          relationship.push($(this).val());
        });

        $("[name='dependent_civil[]']").each(function(){
          civil.push($(this).val());
        });

        $.ajax({
          type: "post",
          url: "http://localhost/hmo/public/transaction/contract/member/create/store",
          data: {name:name, bday:bday, relationship:relationship, civil:civil, id:id},
          dataType: "json",
        });

      }

    });

  </script>

@endsection













{{--  --}}
