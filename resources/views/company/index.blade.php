@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Company</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaction</li>
            <li class="breadcrumb-item">Contract</li>
            <li class="breadcrumb-item active">Company</li>
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
              <a href="http://localhost/hmo/public/transaction/contract/company/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-hover transaction_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>End of Contract</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($companies as $company)
                  <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->address}}</td>
                    <td>
                      @if (empty($company->endo))
                        {{$company->contract}}
                      @else
                        {{$company->endo}}
                      @endif
                    </td>
                    <td>
                      <a href="http://localhost/hmo/public/transaction/contract/company/{{$company->id}}/view" class="btn btn-info">View</a>
                      <a href="http://localhost/hmo/public/transaction/contract/company/{{$company->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_company_{{$company->id}}">Delete</button>
                    </td>

                    <div id="delete_company_{{$company->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header bg-danger">
                            <h4 class="modal-title">Delete Company</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                              <span aria-hidden="true">x</span>
                            </button>
                          </div>

                          <div class="modal-body text-center">
                            Are you sure you want to delete:<br>
                            <b>{{$company->name}}</b>?
                          </div>

                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            {!! Form::open(['action' => ['CompanyController@destroy', $company->id], 'method' => 'POST']) !!}
                              {{-- {!! Form::hidden('_method', 'DELETE') !!} --}}
                              <input type="hidden" name="_method" value="DELETE">
                              {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                          </div>

                        </div>
                      </div>
                    </div>

                  </tr>
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
