@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Application</h3>
        </div>
        <div class="box-body">
            <div style="margin-bottom: 8px">
            <a href="{{ route('apps.apps-mapping-add') }}" type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Add new user</a>
            </div>
            <table id="example2" class="table table-bordered table-striped" style="min-width: 1082px">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>PERNR</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Application Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php($no = 1)
                <tbody>
                @foreach($getApp as $a)
                <tr>
                    <td>{{$no++}}</td>
                    <td style="min-width: 100px">{{$a->PERNR}}</td>
                    <td style="min-width: 200px">{{$a->NAME}}</td>
                    <td style="min-width: 200px">{{$a->EMAIL}}</td>
                    <td style="min-width: 200px">{{$a->appsname}}</td>
                    <td style="min-width: 110px">
                        <a class="btn btn-xs btn-block btn-primary" href="{{ route('apps.apps-mapping-edit' , $a->ID) }}"><i class="fa fa-pencil-square-o"></i> Edit </a>
                        <button type="button" class="btn btn-xs btn-block btn-danger" data-toggle="modal" data-target="#delete{{$a->ID}}">
                        <i class="fa fa-times"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
</div>
</div>

@foreach($getApp as $row)
<div class="modal fade" id="delete{{$row->ID}}" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Delete Mapping Application</h4>
            </div>
            <form role="form" method="post" action="{{ route('apps.mapping-delete', $row->ID) }}">
                @csrf
                <div class="modal-body">
                    <p> Hapus data mapping aplikasi {{$row->appsname}} dengan Users {{$row->NAME}} ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection