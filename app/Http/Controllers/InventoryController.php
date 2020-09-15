<?php

namespace App\Http\Controllers;

use App\inventory;
use App\product;
use App\warehouse;
use App\cabin;
use DB;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class InventoryController extends Controller
{

 public function inventoryHome()
 {
    $inventory=inventory:: all();
    $product=product:: all();
    $product2=product:: all();
    $warehouse=warehouse:: all();
    $warehouse2=warehouse:: all();
    $cabin=cabin:: all();
    $cabin2=cabin:: all();

    $data= DB::table('inventories')
    ->join('products','products.id','=','inventories.product_id')
    ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
    ->join('cabins','cabins.id','=','inventories.cabin_id')
    ->select('inventories.*', 'products.product', 'warehouses.warehouse_name','cabins.cabin_name')
    ->get();
          /*
          print_r($data);*/

          return view ('inventory',compact('inventory','product','warehouse','data','product2','warehouse2','cabin2','cabin','formArray','reg'));
      }


      public function inventoryHistory()
 {
    $inventory=inventory:: all();
    $product=product:: all();
    $product2=product:: all();
    $warehouse=warehouse:: all();
    $warehouse2=warehouse:: all();
    $cabin=cabin:: all();
    $cabin2=cabin:: all();

    $data= DB::table('inventories')
    ->join('products','products.id','=','inventories.product_id')
    ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
    ->join('cabins','cabins.id','=','inventories.cabin_id')
    ->select('inventories.*', 'products.*', 'warehouses.warehouse_name','cabins.cabin_name')
    ->get();
   
          return view ('inventoryHistory',compact('inventory','product','warehouse','data','product2','warehouse2','cabin2','cabin','formArray','reg','user'));
      }

      public function save(Request $request)
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
            return redirect('/inventory')->with('message','Inventory Details Add successfully');
        }

    }

    public function get_inventory(Request $request)

    {
        $inventory=inventory::find($request['id']);
        $data = [
            'inventory_id' => $inventory->id,
            'product_id' => $inventory->product_id,
            'warehouse_id' => $inventory->warehouse_id,
            'cabin_id' => $inventory->cabin_id,
            'quantity' => $inventory->quantity,
        ];
        return $data;
    }



    public function fetch1(Request $request)
    {
        $cabins=cabin::where('warehouse_id',$request->value)->get();
     //  dd($request->all(),$cabins);

        $html = '<option value="">Select Cabin</option>';
        foreach($cabins as $cabin)
        {
            $html .= '<option value="'.$cabin->id.'">'.$cabin->cabin_name.'</option>';
        }

        // dd($html);
        return $html;
    }

    public function fetch2(Request $request)
    {
        $cabin2=cabin::where('warehouse_id',$request->value)->get();
        // dd($request->all(),$cabin);

        $html = '<option value="">Select Cabin</option>';
        foreach($cabin2 as $cabin)
        {
            $html .= '<option value="'.$cabin->id.'">'.$cabin->cabin_name.'</option>';
        }
        // dd($html);
        return $html;
    }

    public function inventory_update(Request $request)

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
       
             return redirect('/inventory')->with ('message', ' Product successfully updated.');
    }


    public function delete($id)
    {

        $inventory=inventory::find($id);
        
        $deleted = $inventory->delete();
        if ($deleted) 
        {
            return redirect('/inventory')->with ('message', ' Product successfully deleted!');
        }
    }  

    

}
