<?php
use App\Models\Cart;


function cart_count(){
    return Cart::where('user_id',auth()->id())->count();
}
function cart_list(){
    return Cart::where('user_id',auth()->id())->get();
}
// function relationwithproduct(){
//     return hasOne(Product::class, 'id','product_id' );
// }



?>
