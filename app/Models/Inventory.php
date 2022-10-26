<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    public function relationwithsize(){
        return $this->hasOne(Size::class, 'id','size_id' );
    }
    public function relationwithcolor(){
        return $this->hasOne(Color::class, 'id','color_id' );
    }
    public function relationwithproduct(){
        return $this->hasOne(Product::class, 'id','product_id' );
    }
}
