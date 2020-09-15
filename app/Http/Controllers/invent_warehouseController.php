<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\warehouse;
use App\DB;
use Picqer;

class invent_warehouseController extends Controller
{
   
    
 public function index()
        {
        $warehouse=warehouse:: all();
        return view ('invent_warehouse',compact('warehouse'));
        }

 public function invent_insert(Request $request)
        {
        $warehouse = new warehouse;
        $warehouse= warehouse::create([
        'warehouse_name'=>$request->warehouse_name,
        'warehouse_location'=>$request->warehouse_location,
        ]);/*
        print_r($warehouse);
        exit();*/
        if ($warehouse) {
        return redirect('/index_warehouse')->with('message','Warehouse Details Add successfully');
        }

        }

public function invent_ware(Request $request)
        
        {
        $warehouse=warehouse::find($request['id']);
        $data = [
        'warehouse_id' => $warehouse->id,
        'warehouse_name' => $warehouse->warehouse_name,
        'warehouse_location' => $warehouse->warehouse_location,
        ];
        return $data;
        }



 public function invent_update(Request $request)
        
        {
        $warehouse=warehouse::find($request->warehouse_id);
//        dd($warehouse);
        $warehouse->update($request->all());
        return back();
        }


 public function delete($id)
        {

        $warehouse=warehouse::find($id);
        $deleted = $warehouse->delete();
        if ($deleted) 
        {
        return redirect('/index_warehouse')->with ('message', ' warehouse successfully deleted!');
        }
        } 
}
