@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title" style="margin-bottom: 8px">Add Application Mapping</h3>
  </div>
  <div class="box-body">
    <form role="form" method="post" action="{{ route('apps.mapping-add') }}">
      @csrf
        <div class="form-group">
          <label>Select Personal Number</label>
          <select class="form-control" name="pernr" id="pernr" required>
            @foreach($getUsers as $row)
              <option value="{{$row->PERNR}}"> {{$row->PERNR}} | {{$row->NAME}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Select Application</label>
          <select class="form-control" name="appsname" id="appsname" required>
            @foreach($getApp as $row)
              <option value="{{$row->ID}}"> {{$row->appsname}} </option>
            @endforeach
          </select>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
          </button>
        </div>
      </form>
    </div>
</div>
</div>
</div>
@endsection