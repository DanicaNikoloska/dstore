<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $cart = ShoppingCart::where('user_id', $user_id)->first();
        $cart_id = ShoppingCart::where('user_id', $user_id)->pluck('id');
        $products = DB::table('products')
            ->join('shopping_cart_product', 'products.id', '=', 'shopping_cart_product.product_id')
            ->where('shopping_cart_product.cart_id', $cart_id)
            ->get();
        $sum = $cart->products()->sum('price');
        return view('shoppingCart')->with(['products' => $products, 'sum' => $sum]);
    }

    public function create($product_id){

        $user_id = Auth::user()->id;
        $cart = ShoppingCart::where('user_id', $user_id)->first();

        if (!$cart->products->contains($product_id)) {
          $cart->products()->attach($product_id);
          return redirect('/cart')->with('success', 'The product has been successfully added to your shopping cart.');
        }
        else{
            return redirect('/cart')->with('error', 'The product is already added in your shopping cart.');
        }


    }

    public function destroy($product_id){
        $user_id = Auth::user()->id;
        $cart = ShoppingCart::where('user_id', $user_id)->first();
        $cart->products()->detach($product_id);
        return redirect('/cart')->with('success', 'The product has been successfully removed from your shopping cart.');
    }
}
