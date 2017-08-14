@extends('layouts.admin')

@section('content')
    @include('inc.messages')
    <div class="col-xs-10">
        {{Form::open(array('url' => '/admin/categories/'.$category->id, 'method' => 'put'))}}
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="{{$category->name}}" name="name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" value="{{$category->description}}" name="description">
        </div>
        <button type="submit" class="btn btn-success pull-right">Update</button>
        {{Form::close()}}
    </div>
@endsection