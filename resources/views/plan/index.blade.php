@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Plan</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item active">Plan</li>
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
              <a href="http://localhost/hmo/public/maintenance/plan/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover maintenance_table">
              <thead>
                <tr>
                  <th>Plan</th>
                  <th>Applicable For</th>
                  <th>Amount Limit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($plans as $plan)
                  <tr>
                    <td>{{$plan->plan}}</td>
                    <td>
                      @php
                        $explode_membership = explode(',', $plan->membership_id);
                      @endphp
                      @foreach ($memberships as $membership)
                        @if (in_array($membership->id, $explode_membership))
                          {{$membership->type}}<br>
                        @endif
                      @endforeach
                    </td>
                    <td>₱ {{number_format($plan->benefit, 2)}}</td>
                    <td>
                      <a href="http://localhost/hmo/public/maintenance/plan/{{$plan->id}}/view" class="btn btn-info">View</a>
                      <a href="http://localhost/hmo/public/maintenance/plan/{{$plan->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_plan_{{$plan->id}}">Delete</button>
                    </td>
                  </tr>

                  {{-- <div id="delete_pec_{{$pec->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Pre Existing Condition</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          Are you sure you want to delete:<br>
                          <b>{{$pec->condition}}</b>?
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['PECController@destroy', $pec->id], 'method' => 'POST']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
                          {!! Form::close() !!}
                        </div>

                      </div>
                    </div>
                  </div> --}}

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
