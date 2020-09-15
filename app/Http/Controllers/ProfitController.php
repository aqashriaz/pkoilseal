<?php

namespace App\Http\Controllers;
use App\product;
use App\inventory;
use App\warehouse;
use App\cabin;
use App\Sale;
use DB;
use App\Return_product;

use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function profit_index()
    {
     return view ('profit_bydate');

    }

    public function todayprofit()
    {
	 $data= DB::table('sales')
        ->join('products','products.id','=','sales.product_id')
        ->select('sales.*', 'products.product', 'products.p_price')
          ->get();

    		$today = DB::table('sales')->select(DB::raw('*'))
	->whereRaw('Date(created_at) = CURDATE()')->get();

        $salesum = DB::table('sales')->whereRaw('Date(created_at) = CURDATE()')->sum('price');
/*
        print_r($today);
        exit();*/
     return view ('todayprofit',compact('today','salesum','data'));

    }


public function weeklyprofit()
	{
 $date = \Carbon\Carbon::today()->subDays(7);
    $salesum7 = Sale::where('created_at','>=',$date)->get();
 $data= DB::table('sales')
        ->join('products','products.id','=','sales.product_id')
        ->select('sales.*', 'products.product', 'products.p_price')
          ->get();
 $date = \Carbon\Carbon::today()->subDays(7);
    $weeklysum = Sale::where('created_at','>=',$date)->sum('price');
    
    		return view ('weeklyprofit',compact('salesum7','date','weeklysum','data'));

	}

public function monthlyprofit()
	{
 $date = \Carbon\Carbon::today()->subDays(30);
    $salesum30 = Sale::where('created_at','>=',$date)->get();
$data= DB::table('sales')
        ->join('products','products.id','=','sales.product_id')
        ->select('sales.*', 'products.product', 'products.p_price')
          ->get();
 $date = \Carbon\Carbon::today()->subDays(30);
    $monthlysum = Sale::where('created_at','>=',$date)->sum('price');
    
    		return view ('monthlyprofit',compact('salesum30','date','monthlysum','data'));

	  }
      public function yearlyprofit()
    {
 $date = \Carbon\Carbon::today()->subDays(365);
    $salesum365 = Sale::where('created_at','>=',$date)->get();
$data= DB::table('sales')
        ->join('products','products.id','=','sales.product_id')
        ->select('sales.*', 'products.product', 'products.p_price')
          ->get();

 $date = \Carbon\Carbon::today()->subDays(365);
    $yearlysum = Sale::where('created_at','>=',$date)->sum('price');
    
            return view ('yearlyprofit',compact('salesum365','date','yearlysum','data'));

      }
      public function profit_date(Request $request)
    {
        $from=$request->from;
        $to=$request->to;

        $ab=Sale::whereBetween('created_at', [$from, $to])->get();
	    return view ('profit_date',compact('ab','from','to'));

    }


}
