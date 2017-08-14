@extends('layouts.admin')

@section('content')
    @include('inc.messages')
    <div class="col-xs-10">
        {{Form::open(array('url' => '/admin/users/'.$user->id, 'method' => 'put'))}}
        <div class="form-group">
            <label>Name</label>
            <input type="text" value="{{$user->name}}" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" value="{{$user->email}}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" value="{{$user->password}}" class="form-control" name="password">
        </div>
        <div class="form-group">
            <select class="form-control" name="role">
                <option value="0" @if($user->role == 0) selected @endif>Admin</option>
                <option value="1" @if($user->role == 1) selected @endif>Moderator</option>
                <option value="2" @if($user->role == 2) selected @endif>Visitor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success pull-right">Update</button>
        {{Form::close()}}
    </div>
@endsection