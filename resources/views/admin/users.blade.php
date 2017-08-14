@extends('layouts.admin')

@section('content')
    @include('inc.messages')
    <h3>Users</h3>
    <hr>
    <button data-toggle="modal" data-target="#addUser" class="btn btn-primary"><span class="glyphicon glyphicon-plus"> </span> Add new user</button>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->role == 0)
                        Administrator
                    @elseif($user->role == 1)
                        Moderator
                    @else
                        Visitor
                    @endif
                </td>
                <td><a href="/admin/users/{{$user->id}}/edit">
                        <button class="btn btn-default">Edit</button>
                    </a>
                </td>
                <td>
                    {!! Form::open(array('method' => 'post', 'url' => 'admin/users/'.$user->id))!!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <button type="submit" class="btn btn-danger pull-right">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

<!-- Add UserModal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new user</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('url' => '/admin/users', 'method' => 'post'))}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <select class="form-control" name="role">
                        <option value="0">Admin</option>
                        <option value="1">Moderator</option>
                        <option value="2">Visitor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success pull-right">Add</button>
                {{Form::close()}}
            </div>
            <br><br>
        </div>
    </div>
</div>