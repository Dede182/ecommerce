<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $with = ['cartproducts'];

    public function cartproducts(){
        return $this->hasMany(CartProducts::class);
    }
}
