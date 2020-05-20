<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function product (){
        return $this->belongsTo(Product::class);
    }

    // public function sell (){
    //     return $this->belongsTo(Sell::class);
    // }
}
