<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Sale;

class invoices extends Controller
{
   
  public function invoiceindex()
    {
      	return view ('all_invoices');
    }
public function invoicedate(Request $request)
    {
    	  $from=$request->from;
        $to=$request->to;

        $ab=  $salesum7 = DB::table('sales')->select(DB::raw('invoice_number'))->whereBetween('created_at', [$from, $to])->get();
	    return view ('invoicebydate',compact('ab','from','to'));
    }

    public function todayinvoice()
    {
	$today = DB::table('sales')->select(DB::raw('invoice_number'))
	->whereRaw('Date(created_at) = CURDATE()')->distinct()->get();
   return view ('today_invoice',compact('today','salesum','data'));

    }
      public function weeklyinvoice()
    {
 $date = \Carbon\Carbon::today()->subDays(7);
    $salesum7 = DB::table('sales')->select(DB::raw('invoice_number'))->where('created_at','>=',$date)->distinct()->get();

   return view ('weekly_invoice',compact('salesum7'));

    }
   public function monthlyinvoice()
    {
$date = \Carbon\Carbon::today()->subDays(30);
    $monthly = DB::table('sales')->select(DB::raw('invoice_number'))->where('created_at','>=',$date)->distinct()->get();

   return view ('monthly_invoice',compact('monthly'));

    }
 public function yearlyinvoice()
    {
 $date = \Carbon\Carbon::today()->subDays(365);
     $yearly = DB::table('sales')->select(DB::raw('invoice_number'))->where('created_at','>=',$date)->distinct()->get();

   return view ('yearly_invoice',compact('yearly'));

    }

  public function invoicepdf($invoice_number)
    {
      $sale = Sale::where('invoice_number',$invoice_number)->get(); 
        $array = json_decode(json_encode($sale), true);
        $customer_name1=$array[0]['customer_name'];
        $address1=$array[0]['address'];
        $phone1=$array[0]['phone'];
        $created_at1=$array[0]['created_at'];
        $invoice_number1=$array[0]['invoice_number'];
        $user_name1=$array[0]['user_name'];
        
       
       return view ('invoicepdf',compact('sale','customer_name1','address1','phone1','created_at1','invoice_number1','user_name1'));
    }

     public function prntpriview()
      {
            $sale = Sale::all();
            return view('/invoicepdf',compact('sale'));
      }
 
public function downloadinvoice($invoice_number) {
	//dd($invoice_number);
      $sale = Sale::where('invoice_number',$invoice_number)->get(); 
	       $array = json_decode(json_encode($sale), true);
        $customer_name1=$array[0]['customer_name'];
        $address1=$array[0]['address'];
        $phone1=$array[0]['phone'];
        $created_at1=$array[0]['created_at'];
        $invoice_number1=$array[0]['invoice_number'];
        $user_name1=$array[0]['user_name'];
        
      
        $pdf = PDF::loadView('invoicepdf',compact('sale','customer_name1','address1','phone1','created_at1','invoice_number1','user_name1'));
	        
        return $pdf->download('invoicepdf.pdf');
}


public function downloadinvoiceweekly($invoice_number) {
	//dd($invoice_number);
      $sale = Sale::where('invoice_number',$invoice_number)->get(); 
	       $array = json_decode(json_encode($sale), true);
        $customer_name1=$array[0]['customer_name'];
        $address1=$array[0]['address'];
        $phone1=$array[0]['phone'];
        $created_at1=$array[0]['created_at'];
        $invoice_number1=$array[0]['invoice_number'];
        $user_name1=$array[0]['user_name'];
        
      
        $pdf = PDF::loadView('invoicepdf',compact('sale','customer_name1','address1','phone1','created_at1','invoice_number1','user_name1'));
	        
        return $pdf->download('invoicepdf.pdf');
}

}
