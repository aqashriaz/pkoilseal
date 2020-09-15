<?php

namespace App\Http\Controllers;
use App\product;
use App\inventory;
use App\warehouse;
use App\cabin;
use App\Sale;
use App\Return_product;
use DB;
use Illuminate\Http\Request;

class returnproduct extends Controller
{
    public function returnproduct()
    {
    	      $sale=Sale:: orderBy('id', 'desc')->take(20)->get();
     return view ('returnproduct',compact('sale'));

    }
   public function productReturnConfirm($id)
    {
      /*  $_GET[$id];*/
        
              $sale=Sale::find($id);
             /* print_r($sale);
        exit();*/
     return view ('confirmReturnProduct',compact('sale'));

    }



 public function returnitem(Request $request)
		{

		$sale=Sale::find($request->id);

		$productID=$sale['product_id'];
		$quantity=$sale['quantity'];
   /* print_r($quantity);
    exit();*/

		$inventory = DB::Table('inventories')->select('quantity')->where('product_id', $productID)->get();  
             
         $array = json_decode(json_encode($inventory), true);
         $actual_quantity=$array[0]['quantity'];
         $new_quantity= $actual_quantity + $quantity;

         $result = DB::table('inventories')
    ->where('product_id', $productID)
    ->update(['quantity' => $new_quantity]);

     
 $Return_product= Return_product::create([
        'product_name'=>$request->product_name,
        'return_quantity'=>$request->quantity,
        'return_reason'=>$request->return_reason,
          'unit_price'=>$request->unit_price,
        'price'=>$request->price,
        ]);

        $deleted = $sale->delete();
        if ($deleted) 
        {
        return redirect('/returnproduct')->with ('message', ' Product return!');
        }
        }  

        

public function get_returnproduct(Request $request)
{
      $sale=Sale::find($request['id']);
             $data = [
            'id' => $sale->id,
            'product_name' => $sale->product_name,
            'quantity' => $sale->quantity,
            'unit_price' => $sale->unit_price,
            'price' => $sale->price,
            'return_quantity' => $sale->return_quantity,
            'return_reason' => $sale->return_reason,
        ];

        return $data;
}



 public function update_retrunproduct(Request $request)
        {
      
 $Return_product= Return_product::create([
        'product_name'=>$request->product_name,
        'return_quantity'=>$request->return_quantity,
      
        'return_reason'=>$request->return_reason,
        ]);
/*print_r($Return_product);
            exit();*/
                return redirect('returnitem');
        }

}
