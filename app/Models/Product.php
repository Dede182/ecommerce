<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeSearch($q){
        $q->when(request('search'),function($q){
            $search = request('search');
            $q->orWhere('title' ,'like',"%$search%");

        });
    }
    public function scopeCategory($q){
        $q->when(request('category'),function($q){
            $search = request('category');
            $category = Category::where('title','like',"%$search%");
            return $category;
            $q->orWhere('category_id' ,'=',"%$category%");

        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
