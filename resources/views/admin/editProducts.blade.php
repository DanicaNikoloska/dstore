@extends('layouts.admin')

@section('content')
    @include('inc.messages')
    <div class="col-xs-10">
        {{Form::open(array('url' => '/admin/products/'.$product->id, 'method' => 'put', 'files' => true, 'enctype' => 'multipart/form-data'))}}
        <div class="form-group">
            <label>Name</label>
            <input type="text" @if(Auth::user()->isModerator()) readonly @endif class="form-control" value="{{$product->name}}" name="name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" @if(Auth::user()->isModerator()) readonly @endif value="{{$product->description}}" name="description">
        </div>
        <div class="form-group">
            <select multiple class="form-control" name="category_id" @if(Auth::user()->isModerator()) readonly @endif>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" value="{{$product->price}}" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" value="{{$product->quantity}}" class="form-control" name="quantity">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" @if($product->available == 1) checked @endif name="available"> Available
            </label>
        </div>
        <div class="form-group">
            <label>Image</label>
            <p>{{$product->image}}</p>
            <input type="file" name="image" @if(Auth::user()->isModerator()) disabled @endif>
            <input type="hidden" name="oldImg" value="{{$product->image}}">
        </div>
        <button type="submit" class="btn btn-success pull-right">Submit</button>
        {{Form::close()}}
    </div>
@endsection