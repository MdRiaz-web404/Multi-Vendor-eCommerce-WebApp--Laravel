<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['quantity'];

    public function relationwithproduct(){
        return $this->hasOne(Product::class, 'id','product_id' );
    }
    public function relationwithuser(){
        return $this->hasOne(User::class, 'id','venor_id' );
    }
    public function relationwithcolor(){
        return $this->hasOne(Color::class, 'id','color_id' );
    }
    public function relationwithsize(){
        return $this->hasOne(Size::class, 'id','size_id' );
    }
    public function relationwithinventory(){
        return $this->hasOne(inventory::class, 'id','inventory_id' );
    }
}
