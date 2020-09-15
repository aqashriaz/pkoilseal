<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	   protected $fillable = [
				'product','p_price','size','color','label','barcode','status','image','brand','type','madein'
    ];


}
