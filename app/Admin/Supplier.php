<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function purchases (){
        return $this->hasMany(Purchase::class);
    }
}
