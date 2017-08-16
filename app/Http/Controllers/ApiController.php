<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        return view('availableProducts');
    }
    public function getAvailableProducts(){
        $products = Product::where('available', 1)->get();
        return response()->json($products);
    }
}
