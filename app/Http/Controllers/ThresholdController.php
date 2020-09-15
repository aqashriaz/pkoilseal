<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Threshold;
class ThresholdController extends Controller
{
    public function threshold()
    {
    	$threshold=Threshold::all();

        $countthreshold = Threshold::count();

    	return view('threshold_setting' , compact('threshold','countthreshold'));
    }
      public function insertThreshold(Request $request)
    {
        {
        $threshold = new Threshold;

       $threshold= Threshold::create([
        'alert'=>$request->alert,
        'warning'=>$request->warning,
        ]);

      
        if ($threshold) {
        return redirect('/threshold')->with('message','New Threshold Value Add successfully');
        }

        }
    }


 public function delete($id)
        {

        $threshold=Threshold::find($id);
        $deleted = $threshold->delete();
        if ($deleted) 
        {
        return redirect('/threshold')->with ('message', ' Threshold value successfully deleted!');
        }
        }  
}
