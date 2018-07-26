<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // $productImage->products
    public function product(){
      return $this->belongsTo(Product::class);
    }
}
