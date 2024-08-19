<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/cart/{product}', function(Request $request, \App\Models\Product $product){
   $cart = $request->session()->get('cart');
   $cart = array_map(function($item) use($product, $request){
       if($product->id === $item['product_id']){
           $item['quantity'] = $request->input('quantity');
       }
       return $item;
   }, $cart);

   $request->session()->put('cart', $cart);
   return response()->json($cart, 200);
});
