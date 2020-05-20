<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category (){
        return $this->belongsTo(Category::class);
    }

    // public function sells (){
    //     return $this->belongsToMany(Sell::class,"product_sell")->withTimestamps();
    // }

    public function stocks (){
        return $this->hasMany(Stock::class);
    }
}
