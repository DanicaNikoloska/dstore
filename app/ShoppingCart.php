<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCart extends Model
{
    use SoftDeletes;
    public function user(){
        return $this->hasOne(\App\User::class);
    }
    public function products(){
        return $this->belongsToMany(\App\Product::class, 'shopping_cart_product', 'cart_id', 'product_id');
    }

}
