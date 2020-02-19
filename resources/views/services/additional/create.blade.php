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
              <a href="http://localhost/hmo/public/maintenance/services/additional">Additional</a>
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
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">

          <div class="card-header bg-primary">
            <h4>Create Additional Service</h4>
          </div>

          <div class="card-body">
            <div class="form-group">
              @include('include.note')
              {!! Form::open(['action' => 'ServicesAdditionalController@store', 'method' => 'POST']) !!}
              <i class="fas fa-asterisk ast"></i>
              <label>Service</label>
              <input type="text" class="form-control" name="additional_service" placeholder="Input Service Name"><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Coverage</label>
              <select name="additional_coverage[]" class="duallistbox" multiple>
                @foreach ($coverages as $coverage)
                  @foreach ($categories as $category)
                    @if ($coverage->category_id == $category->id)
                      <option value="{{$coverage->id}}">{{$coverage->coverage}}</option>
                    @endif
                  @endforeach
                @endforeach
              </select>
            </div>
          </div>

          <div class="card-footer bg-primary text-center">

            <input type="submit" value="Save" class="btn btn-success">
            <a href="http://localhost/hmo/public/maintenance/services/additional" class="btn btn-danger">Back</a>

            {!! Form::close() !!}
          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
















{{--  --}}
