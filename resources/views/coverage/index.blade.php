@extends('layouts.app')


@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Coverage</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item active">Coverage</li>
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
              <a href="http://localhost/hmo/public/maintenance/coverage/create" class="btn btn-success">Create</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th>Coverage</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coverages as $coverage)
                  <tr>
                    <td>{{$coverage->coverage}}</td>
                    @foreach ($categories as $category)
                      @if ($coverage->category_id == $category->id)
                        <td>{{$category->type}}</td>
                      @endif
                    @endforeach
                    <td>{{$coverage->description}}</td>
                    <td>
                      <a href="http://localhost/hmo/public/maintenance/coverage/{{$coverage->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_coverage_{{$coverage->id}}">Delete</button>
                    </td>
                  </tr>

                  <div id="delete_coverage_{{$coverage->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Coverage</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          Are you sure you want to delete:<br>
                          <b>{{$coverage->coverage}}</b>?
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['CoverageController@destroy', $coverage->id], 'method' => 'POST']) !!}
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
