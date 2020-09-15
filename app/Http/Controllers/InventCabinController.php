<?php

namespace App\Http\Controllers;

use App\Invent_cabin;
use App\cabin;
use DB;
use App\warehouse;
use Illuminate\Http\Request;

class InventCabinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invent_cabin()
    {
        //$cabin=cabin:: all();
        $warehouse=warehouse:: all(); 

        $warehouse2=warehouse:: all(); 

        $data= DB::table('cabins')
           ->join('warehouses','warehouses.id','=','cabins.warehouse_id')
           ->select('cabins.*','warehouses.warehouse_name')
           ->get(); 
/*
          print_r($data);
          exit();*/
 

        return view ('invent_cabin',compact('data','warehouse','warehouse2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createcabin(Request $request)
    {

        $cabin = new cabin;
        $cabin= cabin::create([
        'warehouse_id'=>$request->warehouse_id,
        'cabin_name'=>$request->cabin_name,
        ]);

        if ($cabin) {
        return redirect('/invent_cabin')->with('message','Cabin Added successfully');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_cabin(Request $request)
    {
        $cabin=cabin::find($request->cabin_id);
        //dd($inventory);
        $cabin->update($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invent_cabin  $invent_cabin
     * @return \Illuminate\Http\Response
     */
    public function show(Invent_cabin $invent_cabin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invent_cabin  $invent_cabin
     * @return \Illuminate\Http\Response
     */
    public function edit_cabin(Request $request)
    {
         $cabin=cabin::find($request['id']);
        $data = [
        'cabin_id' => $cabin->id,
        'cabin_name' => $cabin->cabin_name,
        'warehouse_id' => $cabin->warehouse_id,
        ];
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invent_cabin  $invent_cabin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invent_cabin $invent_cabin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invent_cabin  $invent_cabin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cabin=cabin::find($id);
        $deleted = $cabin->delete();
        if ($deleted) 
        {
        return redirect('/invent_cabin')->with ('message', ' Product successfully deleted!');
        }
        }  

}
