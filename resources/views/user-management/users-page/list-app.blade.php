@extends('user-management.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"> Applications List</h3>
    </div>
  <div class="box-body">
  <div class="col-lg-3 col-xs-12 col-sm-6">
    <div class="small-box bg-white">
      <div style="text-align: center;">
        <img src="{{asset('assets/images/img/logo/UMK.png')}}" width="180" >
      </div>
      <div class="inner">
        {{--  <h4 style="text-align: center">Uang Muka Kerja (UMK)</h4>  --}}
      </div>
      <a href="http://103.86.161.20/umk" target="_blank" class="small-box-footer bg-red">Go to Application <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-12 col-sm-6">
    <!-- small box -->
    <div class="small-box">
        <div style="text-align: center;">
          <img src="{{asset('assets/images/img/logo/procure.png')}}" width="180" style="">
        </div>
        <div class="inner">
          {{--  <h4 style="text-align: center">Procurements</h4>  --}}
        </div>
        <a href="http://localhost:9000" target="_blank" class="small-box-footer bg-red">Go to Application <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>
</div>
</div>
</div>
</div>
@endsection