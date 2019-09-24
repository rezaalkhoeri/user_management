@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title" style="margin-bottom: 8px">Input Data Users</h3>
  </div>
  <div class="box-body">
    <form role="form" method="post" action="{{ route('home.add-user') }}">
      @csrf
        <div class="form-group">
          <label>Personal Number</label>
          <input type="number" class="form-control" name="personal_number" id="personal_number" placeholder="Enter Personal Number">
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="ad_username" id="ad_username" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        {{--  <div class="form-group">
          <label>Assign Number</label>
          <input type="number" class="form-control" id="assign_number" placeholder="Enter Assign Number">
        </div>
        {{--  <div class="row">
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
        </div>  --}}
        {{--  <div class="form-group">
          <label>Tipe Users</label>
          <select class="form-control" id="tipe_users">
            <option>L</option>
            <option>Not L</option>
          </select>
        </div>  --}}
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="zpassword" id="zpassword" placeholder="Password">
        </div>
        {{--  <div class="form-group">
          <label>Role Users</label>
          <select class="form-control" id="role">
            <option>Admin</option>
            <option>Users</option>
          </select>
        </div>  --}}
        <div>
          <button type="submit" class="btn btn-primary">
            {{ __('Add Users') }}
          </button>
        </div>
      </form>
    </div>
</div>
</div>
</div>
@endsection