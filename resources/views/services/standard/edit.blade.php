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
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/services/standard">Standard</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-6">

        <div class="card">

          <div class="card-body">
            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th>Service</th>
                  <th>Coverage</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  @php
                    $explode_coverage = explode(',', $standard->coverage);
                  @endphp

                  <td>{{$standard->standard}}</td>
                  <td>
                    @foreach ($coverages as $coverage)
                      @if (in_array($coverage->id, $explode_coverage))
                        {{$coverage->coverage}}<br>
                      @endif
                    @endforeach
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">

          <div class="card-header bg-primary">
            <h4>Edit Standard Service</h4>
          </div>

          <div class="card-body">
            <div class="form-group">
              @include('include.note')
              {!! Form::open(['action' => ['ServicesStandardController@update', $standard->id], 'method' => 'POST']) !!}
              <i class="fas fa-asterisk ast"></i>
              <label>Service</label>
              <input type="text" class="form-control" name="standard_service" value="{{$standard->standard}}" placeholder="Input Service Name"><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Coverage</label>
              <select name="standard_coverage[]" class="duallistbox" multiple>
                @foreach ($coverages as $coverage)
                  @if (in_array($coverage->id, $explode_coverage))
                    <option value="{{$coverage->id}}" selected>{{$coverage->coverage}}</option>
                  @else
                    @foreach ($categories as $category)
                      @if ($coverage->category_id == $category->id)
                        <option value="{{$coverage->id}}">{{$coverage->coverage}}</option>
                      @endif
                    @endforeach
                  @endif
                @endforeach
              </select>
            </div>
          </div>

          <input type="hidden" name="standard_status" value="Active">

          <div class="card-footer bg-primary text-center">
            {!! Form::hidden('_method', 'PUT') !!}
            <input type="submit" value="Save" class="btn btn-success">
            <a href="http://localhost/hmo/public/maintenance/services/standard" class="btn btn-danger">Back</a>

            {!! Form::close() !!}
          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
















{{--  --}}
