<?php

namespace App\Http\Controllers;

use App\BarCodePrint;
use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\DB;
use PDF;

class BarCodePrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function barcodeindex()
    {
        $product=product::all();
        return view ('/barcode',compact('product'));
    }
  public function pdf($id)
    {
        $product = product::find($id);
       /* print_r($product);
        exit();*/
        return view ('pdf',compact('product'));
    }

     public function prnpriview()
      {
            $product = product::all();
            return view('/barcode',compact('product'));
      }
 
public function downloadPDF($id) {
         $product = product::find($id);
        $pdf = PDF::loadView('pdf',compact('product'));
        /* print_r($product);
        exit();*/
        
        return $pdf->download('barcode.pdf');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\BarCodePrint  $barCodePrint
     * @return \Illuminate\Http\Response
     */
    public function show(BarCodePrint $barCodePrint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarCodePrint  $barCodePrint
     * @return \Illuminate\Http\Response
     */
    public function edit(BarCodePrint $barCodePrint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarCodePrint  $barCodePrint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarCodePrint $barCodePrint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarCodePrint  $barCodePrint
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarCodePrint $barCodePrint)
    {
        //
    }
}
