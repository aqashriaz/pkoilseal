<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Threshold;
class Invent_ThresholdController extends Controller
{ 
	public function invent_threshold()
    {
    	$threshold=Threshold::all();

        $countthreshold = Threshold::count();

    	return view('invent_threshold' , compact('threshold','countthreshold'));
    }
      public function invent_threshold_insert(Request $request)
    {
        {
        $threshold = new Threshold;

       $threshold= Threshold::create([
        'alert'=>$request->alert,
        'warning'=>$request->warning,
        ]);

      
        if ($threshold) {
        return redirect('/invent_threshold')->with('message','New Threshold Value Add successfully');
        }

        }
    }
    public function delete($id)
        {

        $threshold=Threshold::find($id);
        $deleted = $threshold->delete();
        if ($deleted) 
        {
        return redirect('/invent_threshold')->with ('message', ' Threshold value successfully deleted!');
        }
        }  
}