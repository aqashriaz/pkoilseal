<?php

namespace App\Http\Controllers;

use App\inventory;
use App\product;
use App\warehouse;
use App\cabin;
use DB;
use Illuminate\Http\Request;

class invent_inventory extends Controller
{

 public function invent_inventory()
        {
           $inventory=inventory:: all();
        $product=product:: all();
        $warehouse=warehouse:: all();
        $cabin=cabin:: all();

         $data= DB::table('inventories')
        ->join('products','products.id','=','inventories.product_id')
        ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
        ->join('cabins','cabins.id','=','inventories.cabin_id')
        ->select('inventories.*', 'products.product', 'warehouses.warehouse_name','cabins.cabin_name')
          ->get();/*
           print_r($data);*/

        return view ('invent_inventory',compact('inventory','product','warehouse','data','cabin'));
        }

 public function inventory_save(Request $request)
        {
        $inventory = new inventory;
       $inventory= inventory::create([
        'product_id'=>$request->product_id,
        'quantity'=>$request->quantity,
        'warehouse_id'=>$request->warehouse_id,
        'cabin_id'=>$request->cabin_id,
        'prev_quantity'=>$request->quantity,

        ]);
        if ($inventory) {
        return back()->with('message','Inventory Details Add successfully');
        }

        }

    public function invent_fetch1(Request $request)
    {
        $cabins=cabin::where('warehouse_id',$request->value)->get();
        $html = '<option value="">Select Cabin</option>';
        foreach($cabins as $cabin)
        {
            $html .= '<option value="'.$cabin->id.'">'.$cabin->cabin_name.'</option>';
        }
        return $html;
    }


public function invent_get_inventory(Request $request)
        
        {
        $inventory=inventory::find($request['id']);
        $data = [
        'inventory_id' => $inventory->id,
        'product_name' => $inventory->product_id,
        'quantity' => $inventory->quantity,
        'warehouse_name' => $inventory->warehouse_id,
        ];
        return $data;
        }



 public function invent_update_inventory(Request $request)
        
        {
        $inventory=$request->inventory_id;
        $id = Auth()->User()->id; 
        $user=User::find($id);  

        $username= $user->name;   
       $product1= inventory::where('id', $inventory)
       ->update([ 
        'product_id' => $request->product_id,
        'warehouse_id' =>$request->warehouse_id,
        'cabin_id' => $request->cabin_id,
        'quantity' => $request->quantity,
        'added_quantity' => $request->quantity,
        'updated_by' => $username,


        ]);
        return back();
        }


 public function delete($id)
        {

        $inventory=inventory::find($id);
        $deleted = $inventory->delete();
        if ($deleted) 
        {
        return redirect('/invent_inventory')->with ('message', ' Product successfully deleted!');
        }
        }  

}
