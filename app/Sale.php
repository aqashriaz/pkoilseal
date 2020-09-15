<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
      protected $fillable = [
				'product_id','product_name','unit_price','price','quantity','updated_at','created_at','p_price','customer_name','address','phone','user_id','user_name','invoice_number'
    ];

}
