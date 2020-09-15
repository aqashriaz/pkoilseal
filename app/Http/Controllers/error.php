<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class error extends Controller
{
  public function errorlog()
    {
      return view('error');
    }
}
