<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Support\Facades\Session;
use App\inventory;
use App\warehouses;
use App\cabins;
use App\Sale;
use App\User;
use App\color;
use App\Addcart;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Picqer;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class Invoice_pdf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoicepdf()
    {
    $user_id = Auth()->User()->id; 
      $data = Addcart::where('user_id',$user_id)->get(); 
      Session::put('sale',$data);

      $name = Session::get('customername');
       $address = Session::get('address');
       $phone = Session::get('phone');
       $sale = Session::get('sale');

     
      return view ('/invoicepdf',compact('sale','name','address','phone'));
        }
  public function pdf($id)
    {
        $product = Addcart::find($id);
      	return view ('invoicepdf',compact('product'));
    }

     public function pdfpriview()
      {
            $product = Addcart::all();
            return view('/invoicepdf',compact('product'));
      }
 
public function downloadPDF($id) {
	  $user_id = Auth()->User()->id;
	        $data = Addcart::where('user_id',$user_id)->get(); 
        $pdf = PDF::loadView('invoicepdf',compact('product'));
         print_r($data);
        exit();
        
        return $pdf->download('invoicepdf.pdf');
}
   
}
