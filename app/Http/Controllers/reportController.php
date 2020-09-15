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

class reportController extends Controller
{
    public function reportindex()
    {
   		$sale=Sale:: all();
     return view ('reports',compact('sale'));

    }
     public function reportViewIndex()
    {
   		$Return_product=Return_product:: all();
     return view ('admin_return_view',compact('Return_product'));

    }


public function todayReport()
	{
	$today = DB::table('sales')->select(DB::raw('*'))
	->whereRaw('Date(created_at) = CURDATE()')->get();
        $salesum = DB::table('sales')->whereRaw('Date(created_at) = CURDATE()')->sum('price');

	return view ('todayreport',compact('today','salesum'));

	}


public function weeklyreport()
	{
 $date = \Carbon\Carbon::today()->subDays(7);
    $salesum7 = Sale::where('created_at','>=',$date)->get();

 $date = \Carbon\Carbon::today()->subDays(7);
    $weeklysum = Sale::where('created_at','>=',$date)->sum('price');
    
    		return view ('weeklyreport',compact('salesum7','date','weeklysum'));

	}

public function monthlyreport()
	{
 $date = \Carbon\Carbon::today()->subDays(30);
    $salesum30 = Sale::where('created_at','>=',$date)->get();

 $date = \Carbon\Carbon::today()->subDays(30);
    $monthlysum = Sale::where('created_at','>=',$date)->sum('price');
    
    		return view ('monthlyreport',compact('salesum30','date','monthlysum'));

	  }
      public function yearlyreport()
    {
 $date = \Carbon\Carbon::today()->subDays(365);
    $salesum365 = Sale::where('created_at','>=',$date)->get();


 $date = \Carbon\Carbon::today()->subDays(365);
    $yearlysum = Sale::where('created_at','>=',$date)->sum('price');
    
            return view ('yearlyreport',compact('salesum365','date','yearlysum'));

      }
     public function report_date()
    {
        $Return_product=Return_product:: all();

     return view ('reports_date',compact('Return_product'));

    }
  public function report_record(Request $request)
    {
        $from=$request->from;
        $to=$request->to;

        $ab=Sale::whereBetween('created_at', [$from, $to])->get();
       
     return view ('report_Record',compact('ab','from','to'));

    }


}

