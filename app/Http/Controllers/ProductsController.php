<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home')->with(['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required|image|max:1999'
        ];
        $this->validate($request, $rules);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->available = $request->has('available');

        //get filename with extension
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //get filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extension
        $extension = $request->file('image')->getClientOriginalExtension();
        //create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('image')->storeAs('public/images', $filenameToStore);

        //save in database
        $product->image = $filenameToStore;


        $product->save();

        //insert into category-product pivot table
        $categoriesList = $request->input('categories');
        $product->categories()->attach($categoriesList);

        $categories = Category::get();

        return redirect('/admin/products')->with(['success' => 'Product added!', 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('Product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin/editProducts')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'image|max:1999'
        ];
        $this->validate($request, $rules);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->available = $request->has('available');

        // if new image is uploaded
        if ($request->hasFile('image')) {
            //get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/images', $filenameToStore);
        }
        // if no image is uploaded, save the old one
        else {
            $filenameToStore = $request->input('oldImg');
        }

        //save in database
        $product->image = $filenameToStore;


        $product->save();
       // $product->categories()->attach($request->input('categories'));


        $categories = Category::get();

        return redirect('/admin/products')->with(['success' => 'Product updated!', 'categories' => $categories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        //delete image from storage
        unlink(public_path('storage\images\\'.$product->image));
        return redirect('/admin/products')->with('success', 'Product removed!');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        $category = $request->input('category');

        if($category == 0){
            $products = Product::where('name', 'LIKE', '%'.$keyword.'%')
                ->get();
        }
        else{
            $productsInCategory = Category::find($category)->products()->pluck('id');
            $products = Product::where('name', 'LIKE', '%'.$keyword.'%')
                ->whereIn('id', $productsInCategory)
                ->get();
        }
        $categories = Category::get();
        return view('home')->with(['products' => $products, 'categories' => $categories, 'keyword' => $keyword, 'category_selected' => $category]);
    }

    public function listAllProducts(){
        $products = Product::all();
        $categories = Category::get();
        return view('admin/products')->with(['products' => $products, 'categories' => $categories]);
    }
}
