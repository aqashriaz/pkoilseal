<?php

namespace App\Http\Controllers;

use App\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function indexColor()
        { 
        $color=color:: all();
        return view ('add_color',compact('color'));

        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertcolor(Request $request)
    {
        {
        $color = new color;

       $color= color::create([
        'color'=>$request->color,
        ]);

      
        if ($color) {
        return redirect('/indexColor')->with('message','New Color Add successfully');
        }

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        
    }

 public function delete($id)
        {

        $color=color::find($id);
        $deleted = $color->delete();
        if ($deleted) 
        {
        return redirect('/indexColor')->with ('message', ' Color successfully deleted!');
        }
        }  

}
