@extends('user-management.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"> Applications List</h3>
    </div>
  <div class="box-body">

  @foreach($getApp as $row)
  <div class="col-lg-3 col-xs-12 col-sm-6">
    <div class="small-box bg-white">
      <div style="text-align: center;">
        <!-- <img src="{{asset('assets/images/img/logo/UMK.png')}}" width="180" > -->
      </div>
      <div class="inner">
        <h4 style="text-align: center; color:black;">{{$row->appsname}}</h4>
      </div>
      <a href="http://{{$row->url}}{{$tokenCredential}}" target="_blank" class="small-box-footer bg-red">Go to Application <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endforeach
</div>
</div>
</div>
</div>
@endsection