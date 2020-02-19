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
            <li class="breadcrumb-item active">Room</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="container-fluid">

        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <a href="http://localhost/hmo/public/maintenance/room/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Description</th>
                  <th>Maximum Covered Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                  <tr>
                    <td>{{$room->type}}</td>
                    <td>{{$room->description}}</td>
                    <td>₱ {{number_format($room->amount, 2)}}</td>
                    <td>
                      <a href="http://localhost/hmo/public/maintenance/room/{{$room->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" data-toggle="modal" data-target="#delete_room_{{$room->id}}" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>

                  <div id="delete_room_{{$room->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Room</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          Are you sure you want to delete:<br>
                          <b>{{$room->type}}</b>?
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['RoomController@destroy', $room->id], 'method' => 'POST']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
                          {!! Form::close() !!}
                        </div>

                      </div>
                    </div>
                  </div>

                @endforeach
              </tbody>
            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
