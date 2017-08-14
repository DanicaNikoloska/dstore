@extends('layouts.admin')

@section('content')
    @include('inc.messages')
    <h3>Categories</h3>
    <hr>
    <button data-toggle="modal" data-target="#addCategory" class="btn btn-primary"><span class="glyphicon glyphicon-plus"> </span> Add new category</button>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <a href="/admin/categories/{{$category->id}}/edit">
                        <button class="btn btn-default">Edit</button>
                    </a>
                <td>
                    {!! Form::open(array('method' => 'post', 'url' => 'admin/categories/'.$category->id))!!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <button type="submit" class="btn btn-danger pull-right">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

<!-- Add Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new category</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('url' => '/admin/categories', 'method' => 'post'))}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <button type="submit" class="btn btn-success pull-right">Add</button>
                {{Form::close()}}
            </div>
            <br><br>
        </div>
    </div>
</div>