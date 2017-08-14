@extends('layouts.app')

@section('content')
    <a href="{{url('/')}}">
        <button class="btn btn-default">Go back</button>
    </a>
    <div class="media well">
        <div class="media-left">
            <a href="#">
                <img class="media-object product_image" src="../storage/images/{{$product->image}}" alt="">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{$product->name}}</h4>
            <p>{{$product->description}}</p>
            <h4>{{$product->quantity}} available</h4>
            <p>Price: <span class="product_price">${{$product->price}}</span></p>
            {{Form::open(array('method' => 'post','url' => '/cart/'.$product->id))}}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" @if(Auth::guest()) disabled @endif>Add to cart</button>
            {{Form::close()}}

        </div>
    </div>
@endsection