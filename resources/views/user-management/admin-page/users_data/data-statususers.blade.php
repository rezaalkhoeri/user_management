@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title" style="margin-bottom: 8px">Data Users Active</h3>
    </div>
    <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No.</th>
          {{-- <th>Personal Number</th> --}}
          {{-- <th>Assignment Number</th> --}}
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Status</th>
          {{--  <th>Type</th>  --}}
          {{--  <th>Role</th>  --}}
          {{--  <th>Expired</th>  --}}
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
          {{-- <td>{{$a->PERNR}}</td> --}}
          {{-- <td>{{$a->ASSIGNMENT_NUMBER}}</td> --}}
          <td>{{$a->NAME}}</td>
          <td>{{$a->AD_USERNAME}}</td>
          <td>{{$a->EMAIL}}</td>
          <td>
              @if($a->IS_ACTIVE == 1)
                <span class="label label-primary bold uppercase"> Activate</span>
              @else
                <span class="label label-danger bold uppercase">Deactivate</span>
              @endif
          </td>
          {{--  <td>
            @if($a->ZTIPE == 'L')
              <span class="label label-success bold uppercase"> LDAP</span>
            @else
              <span class="label label-warning bold uppercase"> Not LDAP</span>
            @endif
          </td>  --}}
          {{--  <td>{{$a->ZROLE}}</td>  --}}
          {{--  <td>{{$a->ZUSER_EXPIRY}}</td>  --}}
          <td class="row" style="min-width: 200px">
              @if($a->IS_ACTIVE == 1)
              <form method="post" action="{{ route('home.delete-user',[$a->PERNR,$a->ASSIGNMENT_NUMBER]) }}">
                  {{-- <a class="btn btn-info" href="{{ route('home.update-user-index' , $a->PERNR) }}"><i class="fa fa-pencil-square-o"></i>Edit</a> --}}
                  @csrf
                  <button type="submit" class="btn btn-danger"><i class="fa fa-user-times"></i> Deactivate</button> 
              </form>
              @else
              <form method="post" action="{{ route('home.active-user',[$a->PERNR,$a->ASSIGNMENT_NUMBER]) }}">
                  {{-- <a class="btn btn-info" href="{{ route('home.update-user-index' , $a->PERNR) }}"><i class="fa fa-pencil-square-o"></i>Edit</a> --}}
                  @csrf
                  <button type="submit" class="btn btn-primary">Activate</button> 
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