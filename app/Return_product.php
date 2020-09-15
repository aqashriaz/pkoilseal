<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_product extends Model
{
     protected $fillable = [
				'product_name','return_quantity','return_reason','unit_price','price'
    ];
}
