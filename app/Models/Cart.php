<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function relationwithproduct(){
        return $this->hasOne(Product::class, 'id','product_id' );
    }
    public function relationwithuser(){
        return $this->hasOne(User::class, 'id','user_id' );
    }
}
