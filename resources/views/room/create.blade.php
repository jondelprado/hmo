@extends('layouts.app')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Room</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/room">Room</a>
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
                  <th>Type</th>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                  <tr>
                    <td>{{$room->type}}</td>
                    <td>{{$room->description}}</td>
                    <td>₱ {{number_format($room->amount, 2)}}</td>
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
            <h4>Create Room</h4>
          </div>

          <div class="card-body">
            {!! Form::open(['action' => 'RoomController@store', 'method' => 'POST']) !!}

            <div class="form-group">
              @include('include.note')

              <i class="fas fa-asterisk ast"></i>
              <label>Type</label>
              <input type="text" class="form-control" name="room_type" placeholder="Input Room Type"><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Description</label>
              <textarea name="room_desc" class="form-control" rows="3" placeholder="Input Room Description"></textarea><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Maximum Covered Amount</label>
              <input type="text" class="form-control text-left currency" name="room_amount"
              data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false,
              'prefix': '₱ ', 'placeholder': '0'">

            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input id="submit" type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/maintenance/room" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}

        </div>
      </div>

      </div>
    </div>

    <script>

      $("[name='room_type']").on("keyup", function(){
        if ($(this).val().length != 0) {
          $(this).css("border-color", "green");
        }
        else {
          $(this).css("border-color", "red");
        }
      });

      $("[name='room_desc']").on("keyup", function(){
        if ($(this).val().length != 0) {
          $(this).css("border-color", "green");
        }
        else {
          $(this).css("border-color", "red");
        }
      });

      $("[name='room_amount']").on("keyup", function(){
        if ($(this).val().length != 0 && $(this).val() != "₱ 0.00") {
          $(this).css("border-color", "green");
        }
        else {
          $(this).css("border-color", "red");
        }
      });

      $("#submit").on("click",function(e){

        var type = $("[name='room_type']");
        var desc = $("[name='room_desc']");
        var amount = $("[name='room_amount']");

        if (type.val().length === 0) {
          toastr.error("Type is Required");
          e.preventDefault(e);
          type.css("border-color", "red");
        }

        if (desc.val().length === 0) {
          toastr.error("Description is Required");
          e.preventDefault(e);
          desc.css("border-color", "red");
        }
        if (amount.val().length === 0 || amount.val() === "₱ 0.00") {
          toastr.error("Maximum Covered Amount is Required");
          e.preventDefault(e);
          amount.css("border-color", "red");
        }

      });

    </script>

@endsection












{{--  --}}
