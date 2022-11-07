<?php
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Product;

function cart_count(){
    return Cart::where('user_id',auth()->id())->count();
}
function cart_list(){
    return Cart::where('user_id',auth()->id())->get();
}
// function relationwithproduct(){
//     return hasOne(Product::class, 'id','product_id' );
// }
function unit_price($product_id, $quantity){
    $product=Product::find($product_id);
   if ($product->discount ) {
    $price = $product->regular_price-(($product->regular_price*$product->discount)/100);
   }else{
    $price=$product->regular_price;
   }
   return $unitPrice= $price*$quantity;
}
// function available_stock($product_id, $size_id, $color_id){


// }

function product($product_id){
   return Product::find($product_id);
}



?>
