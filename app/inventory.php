<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
      protected $fillable = [
				'product_id','quantity','warehouse_id','cabin_id','prev_quantity','updated_by'
    ];


}
