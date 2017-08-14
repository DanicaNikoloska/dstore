@extends('layouts.admin')

@section('content')
   @include('inc.messages')
   <h3>Products</h3>
   @if(Auth::user()->isAdmin())
   <hr>
   <button class="btn btn-primary" data-toggle="modal" data-target="#addProduct"><span class="glyphicon glyphicon-plus"> </span> Add product</button>
   <hr>
   @endif
   <table class="table">
      <thead>
         <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Available</th>
            <th>Quantity</th>
            <th>Edit</th>
             @if(Auth::user()->isAdmin())
            <th>Delete</th>
             @endif
         </tr>
      </thead>
      <tbody>
      @foreach($products as $product)
         <tr>
            <td>{{$product->name}}</td>
            <td>{{str_limit($product->description,40)}}</td>
            <td>${{$product->price}}</td>
            <td class="text-center">{{$product->available}}</td>
            <td class="text-center">{{$product->quantity}}</td>
            <td>
                <a href="{{url('/admin/products/'.$product->id)}}/edit">
                    <button class="btn btn-default">Edit</button>
                </a>
            </td>
             @if(Auth::user()->isAdmin())
            <td>
               {!! Form::open(array('method' => 'post', 'url' => 'admin/products/'.$product->id.'/delete'))!!}
                  {{ Form::hidden('_method', 'DELETE') }}
                  <button type="submit" class="btn btn-danger pull-right">Delete</button>
               {!! Form::close() !!}
            </td>
             @endif
         </tr>
      @endforeach
      </tbody>
   </table>
@endsection

<!-- Add Product Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add new product</h4>
         </div>
         <div class="modal-body">
            {{Form::open(array('url' => '/admin/products/store', 'method' => 'post', 'files' => true, 'enctype' => 'multipart/form-data'))}}
               <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name">
               </div>
               <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="description">
               </div>
              <div class="form-group">
               <select multiple class="form-control" name="categories[]">
                  @foreach($categories as $category)
                     <option value="{{$category->id}}" selected>{{$category->name}}</option>
                  @endforeach
               </select>
              </div>
               <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" max="100000" name="price">
               </div>
               <div class="form-group">
                  <label>Quantity</label>
                  <input type="number" class="form-control" max="100000" name="quantity">
               </div>
               <div class="checkbox">
                  <label>
                     <input type="checkbox" name="available"> Available
                  </label>
               </div>
               <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image">
               </div>
               <button type="submit" class="btn btn-success pull-right">Submit</button>
            {{Form::close()}}
         </div>
        <br><br>
      </div>
   </div>
</div>
