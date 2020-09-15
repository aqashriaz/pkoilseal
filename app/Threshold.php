<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
      protected $fillable = [
				'alert','warning'
    ];
}
