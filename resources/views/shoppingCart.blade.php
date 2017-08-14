@extends('layouts.app')

@section('content')
   <a href="/"><button class="btn btn-default">Continue shopping</button></a>
   <br><br>
   @include('inc.messages')
@foreach($products as $product)
    <div class="media well">
        <div class="media-left">
            <a href="#">
                <img class="media-object product_image_cart" src="../storage/images/{{$product->image}}" alt="">
            </a>
        </div>
        <div class="media-body cart_media_body">
            <h4 class="media-heading">{{$product->name}}</h4>
            <p>{{$product->description}}</p>
            <h4 class="pull-right">Price: ${{$product->price}}</h4>
            {{Form::open(array('method' => 'delete', 'url' => '/cart/'.$product->id))}}
                 <button class="btn btn-danger btn_remove_product pull-right">Remove</button>
            {{Form::close()}}
        </div>
    </div>
@endforeach
    <div class="pull-right">
        <hr>
        <h4>Total: ${{$sum}}</h4>
        <hr>
    </div>
@endsection