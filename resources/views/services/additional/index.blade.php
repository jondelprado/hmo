@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Additional Services</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Additional</li>
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
              <a href="http://localhost/hmo/public/maintenance/services/additional/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th>Service</th>
                  <th>Coverage</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($additionals as $additional)
                  <tr>
                    <td>{{$additional->additional}}</td>
                    @php
                      $explode_coverage = explode(',',$additional->coverage);
                    @endphp
                    <td>
                      @foreach ($coverages as $coverage)
                        @if (in_array($coverage->id, $explode_coverage))
                          {{$coverage->coverage}}<br>
                        @endif
                      @endforeach
                    </td>
                    <td>
                      <a href="http://localhost/hmo/public/maintenance/services/additional/{{$additional->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_additional_{{$additional->id}}">Delete</button>
                    </td>
                  </tr>

                  <div id="delete_additional_{{$additional->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Additional Service</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          Are you sure you want to delete: <br>
                          <b>{{$additional->additional}}</b>?
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['ServicesAdditionalController@destroy', $additional->id], 'method' => 'POST']) !!}
                          {!! Form::hidden('_method', 'DELETE') !!}
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
