<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\product;
use App\warehouse;
use App\cabin;
use App\inventory;
use DB;
use App\User;
use App\Sale;
use App\Addcart;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class frontdeskmanager extends Controller
{


public function __construct()
    {
        $this->middleware('auth');
    }

public function frontdesk()
    {
    $product=product:: all();
    $warehouse=warehouse:: all();
    $cabin=cabin:: all();
    $inventory=inventory:: all();
    $data= DB::table('inventories')
          ->join('products','products.id','=','inventories.product_id')
          ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
          ->join('cabins','cabins.id','=','inventories.cabin_id')
          ->select('products.*','inventories.quantity','warehouses.warehouse_name','cabins.cabin_name')
          ->where ('status','=','Active')
          ->get();

      $user_id = Auth()->User()->id;
      $totalcount = Addcart::where('user_id',$user_id)->count();

   /*     print_r($data);
        exit();
   */ return view ('frontdesk',compact('data','product','warehouse','cabin','inventory','totalcount'));
    }


 public function update_quantity(Request $request)
    {
       $inventory=inventory::find($request->id);

      dd($inventory);

        $inventory = inventory::all();
       
        $updateValues = [
            'quantity' => $request->input('quantity', $product->quantity_result),
        ];
      
        if ($inventory->update($updateValues)) {
            flash()->success('inventory updated successfully.');
        } else {
            flash()->info('inventory was not updated.');
        }

        return back();
    }





public function stockmanage(Request $request)
    {
    $product = product::find($request->id);
    $request->product = $request->product;
    $request->quantity = $request->quantity;
    $request->warehouse = $request->warehouse;
    /*  print_r($inventory);
      exit();*/
    if ($product) {
         $inventoryCount = product::where('quantity',$request->quantity)->count();
    } else {
    product::create($request->all());
    }
    return back();
    }

public function saleout_update(Request $request)
{



  $user_id = Auth()->User()->id; 
$product_id=$request->id;
$productname=$request->product;
$sale_quantity=$request->sale_quantity;
$total_quantity= $request->total_quantity;
$unit_price= $request->unit_price;
$color= $request->color;
$size= $request->size;
$barcode= $request->barcode;
$image= $request->image;
$total_price= $request->total_price;
$p_price= $request->p_price;



$label= $request->label;


$product= Addcart::create([

'product_id'=>$product_id,
'user_id'=>$user_id,
'product_name'=>$productname,
'unit_price'=>$unit_price,
'sale_quantity'=>$sale_quantity,
'quantity'=>$total_quantity,
'color'=>$color,
'size'=>$size,
'label'=>$label,
'barcode'=>$barcode,
'total_price'=>$total_price,
'p_price'=>$p_price,
'image'=>$image,
]);
/*print_r($product);
exit();*/

return back()->with('Error!', 'Sale successfully!!');;


}


public function saleout(Request $request)
        {
          
        $product=product::find($request['id']);

        $id=$request->id;
/*
        print_r($product);
        exit();
*/

        $quantity = DB::Table('inventories')->select('quantity')->where('product_id', $id)->get(); 
        $array = json_decode(json_encode($quantity), true);
        $quantity2=$array[0]['quantity'];

        $data = [
        'id'=>$product->id,
        'product'=>$product->product,
        'p_price'=>$product->p_price,
        'barcode'=>$product->barcode,
        'image'=>$product->image,
        'warehouse'=>$product->warehouse,
        'quantity'=>$quantity2,
        'color'=>$product->color,
        'size'=>$product->size,
        'label'=>$product->label,
        ];

        return $data;
        }


public function super_index_profile(){

    $id = Auth()->User()->id; 
    $user=User::find($id);
  return view('front_profile',compact('user'));
   }       

   public function super_profile(Request $request){
      $id= $request->id;
    User::where('id', $id)
       ->update(['name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => bcrypt($request->password)
        ]);// $user->update($request->all());
        return back()->with ('message', ' User  successfully Updated!'); 
       

 
   }       



 public function cart($id)
        {

        $product=product::find($id);
            print_r($product);
            exit();
        if ($product1) 
        {
        return redirect('/cart_index')->with ('message', ' Product Status Inactive!');
        }
        }  




}
