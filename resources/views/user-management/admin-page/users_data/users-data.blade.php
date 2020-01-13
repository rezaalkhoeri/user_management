@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Users</h3>
      </div>
      <div class="box-body">
        <div style="margin-bottom: 8px">
          <a href="{{ route('users.add-user-index') }}" type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Add new user</a>
        </div>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No.</th>
          <th>Personal Number</th>
          <th>Assignment Number</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Status</th>
          <th>Type</th> 
          <th>Role</th>
          <!-- <th>Expired</th> -->
          <th style="text-align: center">Action</th>
        </tr>
        </thead>
        @php(
          $no = 1
          )
        <tbody>
          @foreach($getdatas as $a)
        <tr>
          <td>{{$no++}}</td>
          <td style="min-width: 150px">{{$a->PERNR}}</td>
          <td style="min-width: 150px">{{$a->ASSIGNMENT_NUMBER}}</td>
          <td style="min-width: 120px">{{$a->NAME}}</td>
          <td>{{$a->AD_USERNAME}}</td>
          <td>{{$a->EMAIL}}</td>
          <td>
              @if($a->IS_ACTIVE == 1)
                <span class="label label-primary bold uppercase"> Aktif</span>
              @else
                <span class="label label-danger bold uppercase"> Nonaktif </span>
              @endif
          </td>
          <td>
            @if($a->ZTIPE == 'L')
              <span class="label label-success bold uppercase"> LDAP</span>
            @else
              <span class="label label-warning bold uppercase"> Not LDAP</span>
            @endif
          </td> 
          <td>
              @if($a->ZROLE == 1)
                <span class="label bg-maroon bold uppercase"> Superadmin </span>
              @elseif($a->ZROLE == 2)
                <span class="label bg-navy bold uppercase"> Admin </span>
              @elseif($a->ZROLE == 3)
                <span class="label bg-purple bold uppercase"> User </span>
              @endif          
          </td>
          <!-- <td>{{$a->ZUSER_EXPIRY}}</td> -->
          <td>
              <a class="btn btn-xs btn-block btn-primary" style="margin-bottom:5px" href="{{ route('users.edit-user' , $a->PERNR) }}"><i class="fa fa-pencil-square-o"></i> Edit </a>
 
              @if($a->IS_ACTIVE == 1)
                <form method="post" action="{{ route('users.delete-user',[$a->PERNR,$a->ASSIGNMENT_NUMBER]) }}">
                  @csrf
                  <button type="submit" class="btn btn-xs btn-block btn-danger"><i class="fa fa-times"></i> Deactivate</button> 
                </form>
              @else
                <form method="post" action="{{ route('users.active-user',[$a->PERNR,$a->ASSIGNMENT_NUMBER]) }}">
                    @csrf
                    <button type="submit" class="btn btn-xs btn-block btn-success"><i class="fa fa-check"></i> Activate</button> 
                </form>
              @endif
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
  @endsection