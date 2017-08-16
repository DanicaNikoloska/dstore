<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function index(){
        return view('availableProducts');
    }

    public function getAvailableProducts(){
        $products = Product::where('available', 1)->get();
        return response()->json($products);
    }

    public function getToken(){
        if(Auth::check()) {
            return Auth::user()->api_token;
        }
        else {
            return null;
        }
    }
}
