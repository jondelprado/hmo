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
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-8">
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
              <tr>
                <td>{{$category->type}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->classification}}</td>
                <td>{{$category->specification}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">

      <div class="card">
        <div class="card-header bg-primary">
          <h4>Edit Category</h4>
        </div>

        <div class="card-body">
          {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST']) !!}

          <div class="form-group">

            {!! Form::label('type', 'Type') !!}
            {!! Form::text('category_type', $category->type, ['class' => 'form-control', 'placeholder' => 'Input Category Type']) !!}
            <br>
            {!! Form::label('desc', 'Description') !!}
            {!! Form::textarea('category_desc', $category->description, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Input Category Description']) !!}
            <br>

            <div class="row">
              <div class="col-lg-6">

                {!! Form::label('class', 'Classification') !!}
                <br>

                @php
                  $standard_checked = "";
                  $additional_checked = "";
                @endphp

                @if ($category->classification == "Standard")
                  @php
                    $standard_checked = "true";
                  @endphp
                @else
                  @php
                    $additional_checked = "true";
                  @endphp
                @endif

                <div class="icheck-success d-inline">
                  {!! Form::radio('category_classification', 'Standard', $standard_checked, ['id' => 'radioSuccess1']) !!}
                  {!! Form::label('radioSuccess1', 'Standard') !!}
                </div><br>

                <div class="icheck-success d-inline">
                  {!! Form::radio('category_classification', 'Additional', $additional_checked, ['id' => 'radioSuccess2']) !!}
                  {!! Form::label('radioSuccess2', 'Additional') !!}
                </div>

              </div>

              <div class="col-lg-6">
                {!! Form::label('specs', 'Specification') !!}<br>

                @php
                  $year_checked = "";
                  $illness_checked = "";
                  $yearillness_checked = "";
                @endphp

                @if ($category->specification == "Per Year")
                  @php
                    $year_checked = "true";
                  @endphp
                @elseif ($category->specification == "Per Illness")
                  @php
                    $illness_checked = "true";
                  @endphp
                @else
                  @php
                    $yearillness_checked = "true";
                  @endphp
                @endif

                <div class="icheck-success d-inline">
                  {!! Form::radio('category_specification', 'Per Year', $year_checked, ['id' => 'radioSuccess3']) !!}
                  {!! Form::label('radioSuccess3', 'Per Year') !!}
                </div><br>

                <div class="icheck-success d-inline">
                  {!! Form::radio('category_specification', 'Per Illness', $illness_checked, ['id' => 'radioSuccess4']) !!}
                  {!! Form::label('radioSuccess4', 'Per Illness') !!}
                </div><br>

                <div class="icheck-success d-inline">
                  {!! Form::radio('category_specification', 'Per Year/Per Illness', $yearillness_checked, ['id' => 'radioSuccess5']) !!}
                  {!! Form::label('radioSuccess5', 'Per Year/Per Illness') !!}
                </div>

              </div>

              {!! Form::hidden('_method', 'PUT') !!}
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

@endsection
