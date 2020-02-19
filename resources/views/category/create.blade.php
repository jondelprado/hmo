@extends('layouts.app')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Category</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a href="http://localhost/hmo/public/maintenance/category">Category</a>
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
                  <th>Classification</th>
                  <th>Specification</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->type}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->classification}}</td>
                    <td>{{$category->specification}}</td>
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
            <h4>Create Category</h4>
          </div>

          <div class="card-body">
            {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}

            <div class="form-group">
              @include('include.note')

              <i class="fas fa-asterisk ast"></i>
              {!! Form::label('type', 'Type') !!}
              {!! Form::text('category_type', '', ['class' => 'form-control', 'placeholder' => 'Input Category Type']) !!}
              <br>
              <i class="fas fa-asterisk ast"></i>
              {!! Form::label('desc', 'Description') !!}
              {!! Form::textarea('category_desc', '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Input Category Description']) !!}
              <br>

              <div class="row">
                <div class="col-lg-6">

                  <i class="fas fa-asterisk ast"></i>
                  {!! Form::label('class', 'Classification') !!}
                  <br>

                  <div class="icheck-success d-inline">
                    {!! Form::radio('category_classification', 'Standard', '', ['id' => 'radioSuccess1']) !!}
                    {!! Form::label('radioSuccess1', 'Standard') !!}
                  </div><br>

                  <div class="icheck-success d-inline">
                    {!! Form::radio('category_classification', 'Additional', '', ['id' => 'radioSuccess2']) !!}
                    {!! Form::label('radioSuccess2', 'Additional') !!}
                  </div>

                </div>

                <div class="col-lg-6">

                  <i class="fas fa-asterisk ast"></i>
                  {!! Form::label('specs', 'Specification') !!}
                  <br>

                  <div class="icheck-success d-inline">
                    {!! Form::radio('category_specification', 'Per Year', '', ['id' => 'radioSuccess3']) !!}
                    {!! Form::label('radioSuccess3', 'Per Year') !!}
                  </div><br>

                  <div class="icheck-success d-inline">
                    {!! Form::radio('category_specification', 'Per Illness', '', ['id' => 'radioSuccess4']) !!}
                    {!! Form::label('radioSuccess4', 'Per Illness') !!}
                  </div><br>

                  <div class="icheck-success d-inline">
                    {!! Form::radio('category_specification', 'Per Year/Per Illness', '', ['id' => 'radioSuccess5']) !!}
                    {!! Form::label('radioSuccess5', 'Per Year/Per Illness') !!}
                  </div><br>

                </div>

              </div>


            </div>

          </div>

          <div class="card-footer bg-primary text-center">
            {!! Form::submit('Save', ['class' => 'btn btn-success pull-right']) !!}
            <a href="http://localhost/hmo/public/maintenance/category" class="btn btn-danger">Back</a>
          </div>
          {!! Form::close() !!}

        </div>
      </div>

      </div>
    </div>

@endsection
