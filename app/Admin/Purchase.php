<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function supplier (){
        return $this->belongsTo(Supplier::class);
    }
}
