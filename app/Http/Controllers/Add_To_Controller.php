<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
 class Add_To_Controller extends Controller
      {


  public function cart_index()
      {  

      $user_id = Auth()->User()->id; 
      $sale = Addcart::where('user_id',$user_id)->get();
      return view ('add_to_cart',compact('sale'));
      }

  public function invoice(Request $request)
      {
      $user_id = Auth()->User()->id; 
       $invoice_number = Session::get('invoice_number');
      $data = Sale::where('invoice_number',$invoice_number)->get(); 
      Session::put('sale',$data);

      $name = Session::get('customername');
       $address = Session::get('address');
       $phone = Session::get('phone');
       $sale = Session::get('sale');
       $user_name = Session::get('user_name');

     
      return view ('/invoice',compact('sale','name','address','phone','invoice_number','user_name'));
      }

  public function checkout(Request $request)
      {
      $user_id = Auth()->User()->id;
      $user_name = Auth()->User()->name;

      $totalprice = Addcart::where('user_id',$user_id)->sum('total_price');
      $sale = Addcart::where('user_id',$user_id)->get();

      $invoice  =(rand(0,100000000));

      $customer_name=$request->customer_name;
      $address=$request->address;
      $phone=$request->phone;
      Session::put('customername', $customer_name);
      Session::put('address', $address);
      Session::put('phone', $phone);
      Session::put('invoice_number', $invoice);
      Session::put('user_name', $user_name);

    foreach ($sale as $row ) {

      $idd = $row['product_id'];
      $quan = $row['quantity'];  

      $sale_array[] = new sale(array(
      'product_id' => $row['product_id'],
      'product_name' => $row['product_name'],
      'unit_price' => $row['unit_price'],
      'p_price' => $row['p_price'],
      'price' => $row['total_price'],
      'quantity' => $row['sale_quantity'],
      'created_at' => $row['created_at'],
      'updated_at' => $row['updated_at'],
      'customer_name'=>$customer_name,
      'address'=>$address,
      'phone'=>$phone,
      'user_id'=>$user_id,
      'user_name'=>$user_name,
      'invoice_number'=>$invoice,

      ));


      $result = DB::table('inventories')
      ->where('product_id', $idd)
      ->update(['quantity' => $quan]);
      }

      $array = json_decode(json_encode($sale_array), true);
      $insert=Sale::insert($array);
       $deleted = Addcart::where('user_id',$user_id)->delete();

  return redirect('invoice');
      }  


  public function delete($id , Request $request)
      {

      $cart=Addcart::find($id);
      $deleted = $cart->delete();
      if ($deleted) 
      {
      return redirect('/cart_index')->with ('message', ' cart item successfully deleted!');
      }
      }  

  public function destroy()
      {
  $user_id = Auth()->User()->id;
  $deleted = Addcart::where('user_id',$user_id)->delete();
      return back();
      }
    

      }
