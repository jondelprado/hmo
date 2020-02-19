@extends('layouts.app')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6">
          <h1>Member</h1>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaction</li>
            <li class="breadcrumb-item">Contract</li>
            <li class="breadcrumb-item active">Member</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="card-title">
              <a href="http://localhost/hmo/public/transaction/contract/member/create" class="btn btn-success">Create</a>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-hover transaction_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Entry Date</th>
                  <th>End of Contract</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($members as $member)
                  @php
                    $fullname = $member->lastname.", ".$member->firstname." ".$member->middlename
                  @endphp
                  <tr>
                    <td>{{strtoupper($fullname)}}</td>
                    <td>{{date('M j, Y \a\t g:ia', strtotime($member->created_at))}}</td>
                    <td>{{{date('M j, Y', strtotime($member->endo))}}}</td>
                    <td>
                      <a href="http://localhost/hmo/public/transaction/contract/member/{{$member->id}}/view" class="btn btn-info">View</a>
                      <a href="http://localhost/hmo/public/transaction/contract/member/{{$member->id}}/edit" class="btn btn-primary">Edit</a>
                      <button type="button" data-toggle="modal" data-target="#delete_member_{{$member->id}}" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>

                  <div id="delete_member_{{$member->id}}" class="modal fade" style="display:none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header bg-danger">
                          <h4 class="modal-title">Delete Member</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>

                        <div class="modal-body text-center">
                          @php
                            $fullname = $member->firstname.", ".$member->lastname." ".$member->middlename;
                          @endphp
                          <p>Are you sure you want to delete record of: <br> <b>{{strtoupper($fullname)}}</b>?</p>
                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          {!! Form::open(['action' => ['MemberController@destroy', $member->id], 'method' => 'POST']) !!}
                            <input type="hidden" name="_method" value="DELETE">
                            {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
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
