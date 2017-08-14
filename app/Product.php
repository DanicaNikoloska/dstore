<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public function categories(){
        return $this->belongsToMany(\App\Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function shoppingCarts(){
        return $this->belongsToMany(\App\ShoppingCart::class, 'shopping_cart_product');
    }
}
