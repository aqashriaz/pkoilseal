<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addcart extends Model
{
     protected $fillable = [
				'product_id','product_name','size','color','label','barcode','image','sale_quantity','unit_price','quantity','user_id','p_price','total_price',
    ];

}
