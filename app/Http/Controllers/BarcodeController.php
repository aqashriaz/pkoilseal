<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Picqer;
use App\product;


class BarcodeController extends Controller
{
 
 public function makeBarcode(Request $request){
 	//validate request
$validator= Validator::make($request->all(),[
 	'barcode'=>'required|string'

]);


//make barcode
if(!$validator->fails())

{
      $label =$request->input('barcode');
	  $barcode_generator =new Picqer\Barcode\BarcodeGeneratorPNG();
	  $barcode = $barcode_generator->getBarcode($label,$barcode_generator::TYPE_CODE_128);
	  $product=product::find(10);
	  $product->barcode=base64_encode($barcode);
	  $product->save();


      return view('barcode',['label'=>$label,'barcode'=>$barcode]);
}


//validate error
return response()->json($validator->message(), 400,array(),JSON_PRETTY_PRINT);





 }


}
