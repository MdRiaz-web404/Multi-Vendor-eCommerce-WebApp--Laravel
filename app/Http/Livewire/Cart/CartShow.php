<?php

namespace App\Http\Livewire\Cart;
use App\Models\Cart;

use Livewire\Component;

class CartShow extends Component
{
    public function decrement($item_id)
    {
        Cart::find($item_id)->decrement('quantity');
    }
    public function increment($item_id)
    {
        Cart::find($item_id)->increment('quantity');
    }
    public function inputQuantuity($item_id, $quantity)
    {
        Cart::find($item_id)->update([
            'quantity'=>$quantity,
        ]);
    }
    public function delete_item($item_id)
    {
        Cart::find($item_id)->delete();
        session()->flash('success','Cart Item Removed Successfully.');
    }
    public function render()
    {
        $carts=Cart::where('user_id',auth()->id())->get();
        return view('livewire.cart.cart-show', compact('carts'));
    }
}
