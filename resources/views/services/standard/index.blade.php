@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Standard Services</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Standard</li>
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
              <a href="http://localhost/hmo/public/maintenance/services/standard/create" class="btn btn-success">Create</a>
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
                @foreach ($standards as $standard)
                  <tr>
                    <td>{{$standard->standard}}</td>
                    @php
                      $explode_coverage = explode(',', $standard->coverage);
                    @endphp
                    <td>
                      @foreach ($coverages as $coverage)
                        @if (in_array($coverage->id, $explode_coverage))
                          {{$coverage->coverage}}<br>
                        @endif
                      @endforeach
                    </td>
                    <td>
                      <a href="http://localhost/hmo/public/maintenance/services/standard/{{$standard->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_standard_{{$standard->id}}">Delete</button>
                    </td>
                  </tr>

                  <div id="delete_standard_{{$standard->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Standard Service</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          Are you sure you want to delete: <br>
                          <b>{{$standard->standard}}</b>?
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['ServicesStandardController@destroy', $standard->id], 'method' => 'POST']) !!}
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
