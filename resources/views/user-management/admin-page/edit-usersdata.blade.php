@extends('user-management.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title" style="margin-bottom: 8px">Edit Data Users</h3>
        </div>
      @foreach ($get as $xusers)
      <div class="box-body">
        <form role="form" method="post" action="{{ route('home.update-user', [$xusers->PERNR, $xusers->ASSIGNMENT_NUMBER]) }}">
          @csrf
            <div class="form-group">
                <label>Personal Number</label>
                <input type="number" class="form-control" value="{{ $xusers->PERNR }}" name="personal_number" id="personal_number" disabled>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" value="{{ $xusers->NAME }}" name="name" id="name">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="ad_username" value="{{ $xusers->AD_USERNAME }}" id="ad_username">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="{{ $xusers->EMAIL }}" id="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Assignment Number</label>
              <input type="number" class="form-control" value="{{ $xusers->ASSIGNMENT_NUMBER }}" name="assignment_number" id="assignment_number" disabled>
            </div>
            {{-- <div class="row">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Active
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Inactive
                </label>
              </div>
            </div> --}}
            {{--  <div class="form-group">
              <label>Tipe Users</label>
              <select class="form-control" id="tipe_users">
                <option>L</option>
                <option>Not L</option>
              </select>
            </div>  --}}
            {{--  <div class="form-group">
              <label>Role Users</label>
              <select class="form-control" id="role">
                <option>Admin</option>
                <option>Users</option>
              </select>
            </div>  --}}
            <div>
              <button type="submit" class="btn btn-primary">
                {{ __('Update Users') }}
              </button>
            </div>
          </form>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection