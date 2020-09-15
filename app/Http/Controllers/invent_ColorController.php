<?php

namespace App\Http\Controllers;
use App\color;
	
use Illuminate\Http\Request;

class invent_ColorController extends Controller
{
     public function invent_color()
        { 
        $color=color:: all();
        return view ('invent_color',compact('color'));

        }
 public function invent_insert_color(Request $request)
    {
        {
        $color = new color;

       $color= color::create([
        'color'=>$request->color,
        ]);

      
        if ($color) {
        return redirect('/invent_color')->with('message','New Color Add successfully');
        }

        }
    }
 public function delete($id)
        {

        $color=color::find($id);
        $deleted = $color->delete();
        if ($deleted) 
        {
        return redirect('/invent_color')->with ('message', ' Color successfully deleted!');
        }
        }  

}
