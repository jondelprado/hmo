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
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/coverage">Coverage</a>
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
                  <th>Coverage</th>
                  <th>Category</th>
                  <th>Description</th>
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
            <h4>Create Coverage</h4>
          </div>

          <div class="card-body">
            {!! Form::open(['action' => 'CoverageController@store', 'method' => 'POST']) !!}
            <div class="form-group">
              @include('include.note')

              <i class="fas fa-asterisk ast"></i>
              <label>Category</label>

              <select class="form-control select2" name="coverage_category">
                <option value="" selected>--Select Category--</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->type}}</option>
                @endforeach
              </select>
              <br><br>

              <i class="fas fa-asterisk ast"></i>
              <label>Coverage</label>
              <input type="text" name="coverage_name" class="form-control" placeholder="Input Coverage">
              <br>

              <i class="fas fa-asterisk ast"></i>
              <label>Description</label>
              <textarea name="coverage_desc" class="form-control" rows="3" placeholder="Input Description"></textarea>
              
            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            <input type="submit" class="btn btn-success" value="Save">
            <a href="http://localhost/hmo/public/maintenance/coverage" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}

        </div>

      </div>

      </div>
    </div>

@endsection

















{{--  --}}
