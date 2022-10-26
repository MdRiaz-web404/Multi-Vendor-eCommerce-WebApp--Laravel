<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Inventory as ModelInventory;
use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product_id;
    public $size_dropdown;
    public $color_dropdown;
    public $available_colors;
    public $decrement_quantity;
    public $increment_quantity;
    public $quantity=0;
    public $unit_price=0;
    public $total_price=0;
    public $inventory;
    public $vendor;
    public $session;
    // public $visibility='d-none';


    public function decrement_quantity(){
        if ($this->quantity >1){
            $this->quantity--;
            $product_price=Product::find($this->product_id);
            if($product_price->discount){
                $this->unit_price= ($product_price->regular_price-(($product_price->regular_price*$product_price->discount)/100));
            }else{
                $decrement_price=$product_price->regular_price;
            }
            $this->unit_price=$this->unit_price*$this->quantity;

        }
    }
    public function increment_quantity(){

        $this->quantity++;
        // $this->visibility='';
        $product_price=Product::find($this->product_id);
        if($product_price->discount){
            $this->unit_price= ($product_price->regular_price-(($product_price->regular_price*$product_price->discount)/100));
        }else{
            $this->unit_price=$product_price->regular_price;
        }
        $this->unit_price=$this->unit_price*$this->quantity;


    }
    public function updatedSizeDropdown($size_id){
        $this->available_colors= ModelInventory::where('product_id',$this->product_id)->where('size_id',$size_id)->get();
        // $this->visibility='d-none';
    }
    public function updatedColorDropdown($inventory_id)
    {
        $this->inventory= ModelInventory::find($inventory_id);


    }

    public function inventoryaddtocart()
    {
        Cart::insert([
            'user_id'=>auth()->id(),
            'venor_id'=>$this->vendor,
            'product_id'=>$this->product_id,
            'size_id'=>$this->inventory->size_id,
            'color_id'=>$this->inventory->color_id,
            'quantity'=>$this->quantity,
            'created_at'=>now(),
        ]);
        $this->reset('quantity');
        $this->session="Product added on Cart Page";
    }
    public function addtocart()
    {
        Cart::insert([
            'user_id'=>auth()->id(),
            'venor_id'=>$this->vendor,
            'product_id'=>$this->product_id,
            'quantity'=>$this->quantity,
            'created_at'=>now(),
        ]);

        $this->reset('quantity');
        $this->session="Product added on Cart Page";

    }

    public function render()
    {
        $this->vendor=Product::find($this->product_id)->vendor_id;
        $inventories=ModelInventory::where('product_id',$this->product_id)->first();
        $available_sizes=ModelInventory::select('size_id')->where('product_id',$this->product_id)->groupBy('size_id')->get();
        return view('livewire.product-details', compact('available_sizes','inventories'));
    }
}
