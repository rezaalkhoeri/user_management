@extends('user-management.master')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title" style="margin-bottom: 8px">Edit Application</h3>
    </div>
    <div class="box-body">
        @foreach($getApp as $row)
            <form role="form" method="post" action="{{ route('apps.update-apps', $row->ID) }}">
            @csrf
                <div class="form-group">
                <label>Application Name</label>
                <input type="text" value="{{$row->appsname}}" class="form-control" name="name" id="name" placeholder="Enter Apps Name" required>
                </div>
                <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" id="desc" cols="30" rows="2">{{$row->Deskripsi}}</textarea>
                </div>
                <div class="form-group">
                <label>URL</label>
                <input type="text" value="{{$row->url}}" class="form-control" name="url" id="url" placeholder="Enter Apps URL" required>
                </div>
                <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
                </div>
            </form>
        @endforeach
    </div>
</div>
</div>
</div>
@endsection