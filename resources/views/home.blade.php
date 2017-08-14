
@extends('layouts.app')

@section('content')

    <div class="row">
        <form action="{{url('/search')}}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" @if(!empty($keyword)) value="{{$keyword}}" @endif name="keyword" placeholder="Search">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 ">
                        <select name="category" class="form-control">
                            <option value="0">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(!empty($category_selected) && $category_selected == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                </div>
        </form>
    </div>
    <hr>
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-6 col-lg-3 col-md-4 col-xs-6 pull-left">
                <div class="thumbnail">
                    <a href="{{url('/show/'.$product->id)}}">
                        <img src="storage/images/{{$product->image}}" alt="" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h4 class="pull-right">${{$product->price}}</h4>
                        <h5><a href="{{url('/show/'.$product->id)}}">{{str_limit(ucfirst($product->name),28)}}</a>
                        </h5>
                        <p>{{str_limit($product->description, 80)}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection