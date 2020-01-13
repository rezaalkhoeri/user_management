@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title" style="margin-bottom: 8px">Input Data Users</h3>
  </div>
  <div class="box-body">
    <form role="form" method="post" action="{{ route('users.add-user') }}">
      @csrf
        <div class="form-group">
          <label>Personal Number</label>
          <input type="number" class="form-control" name="personal_number" id="personal_number" placeholder="Enter Personal Number" required>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="ad_username" id="ad_username" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="zpassword" id="zpassword" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label> Position </label>
          <select class="form-control" name="role" id="role" required>
              <option value="1"> Superadmin </option>
              <option value="2"> Admin </option>
              <option value="3"> User </option>
          </select>
        </div>
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