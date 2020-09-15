<?php

namespace App\Http\Controllers;

use App\cabin;
use App\warehouse;
use DB;
use Illuminate\Http\Request;

class CabinController extends Controller
{  
 public function index()
        {
        $cabin=cabin:: all();
        $warehouse=warehouse:: all();
        $warehouse2=warehouse:: all();
        $data= DB::table('cabins')
           ->join('warehouses','warehouses.id','=','cabins.warehouse_id')
           ->select('cabins.*','warehouses.warehouse_name')
           ->get(); 
       
        return view ('cabin',compact('cabin','warehouse','data','warehouse2'));

        }

 public function insertcabin(Request $request)
        {
        $cabin = new cabin;
        $cabin= cabin::create([

        'warehouse_id'=>$request->warehouse_id,
        'cabin_name'=>$request->cabin_name,
        ]);

        if ($cabin) {
        return redirect('cabin')->with('message','Cabin Added successfully');
        }

        }


public function get_cabin(Request $request)
        
        {
        $cabin=cabin::find($request['id']);
        $data = [
        'cabin_id' => $cabin->id,
        'cabin_name' => $cabin->cabin_name,
        'warehouse_id' => $cabin->warehouse_id,
        ];
        return $data;
        }



 public function cabin_update(Request $request)
        
        {
        $cabin=cabin::find($request->id);
        //dd($inventory);

/*print_r($cabin);
exit();*/
        $cabin->update($request->all());
        return back();
        }

        
 public function delete($id)
        {

        $cabin=cabin::find($id);
        $deleted = $cabin->delete();
        if ($deleted) 
        {
        return redirect('/cabin')->with ('message', ' Product successfully deleted!');
        }
        }  


}
