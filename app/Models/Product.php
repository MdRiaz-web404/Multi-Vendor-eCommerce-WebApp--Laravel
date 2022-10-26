<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function relationwithcategory()
    {
        return $this->hasOne(Category::class, 'id','category_id' );
    }
    public function relationwithuser()
    {
        return $this->hasOne(User::class, 'id','vendor_id' );
    }
}
