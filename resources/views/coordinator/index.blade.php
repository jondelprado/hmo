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
            <li class="breadcrumb-item active">Coordinator</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="card-title">
              <a href="http://localhost/hmo/public/utilities/coordinator/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-hover utilities_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Employee ID</th>
                  <th>Entry Date</th>
                  <th>Action</th>
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
                    <td>{{date('M j, Y \a\t g:ia', strtotime($coordinator->created_at))}}</td>
                    <td>
                      <a href="http://localhost/hmo/public/utilities/coordinator/{{$coordinator->id}}/view" class="btn btn-info">View</a>
                      <a href="http://localhost/hmo/public/utilities/coordinator/{{$coordinator->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_coordinator_{{$coordinator->id}}">Delete</button>
                    </td>
                  </tr>

                  <div id="delete_coordinator_{{$coordinator->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Coordinator</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          <p>Are you sure you want to delete record of: <br> <b>{{strtoupper($fullname)}}</b>?</p>
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['CoordinatorController@destroy', $coordinator->id], 'method' => 'POST']) !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="emp_id" value="{{$coordinator->employee_id}}">
                            <input type="submit" class="btn btn-success" value="Delete">
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














{{--  --}}
