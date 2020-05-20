<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'product_name'=>$this->product_name,
            'category_id'=>$this->category_id,
            "description"=>$this->description,
            'sell_price'=>$this->sell_price,
            'product_code'=>$this->product_code,
            'image'=>$this->image,
            'expire_date'=>$this->expire_date,
            'quantity'=>$this->quantity,
            'qty_per_carton'=>$this->qty_per_carton,
        ];
    }
}
