<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\product;
use App\DB;
use App\color;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Picqer;

class ProductController extends Controller
{

 public function index()
        { 
        $data=product:: all();
        $product=product:: all();
        $color=color:: all();
        $color1=color:: all();
        //dd($product);
        /*        print_r($product);
        exit();*/
        return view ('product',compact('product','data','color','color1'));

        }

 public function save(Request $request)
        {
        $product = new product;
        //  dd($product);
        if ($request->hasFile('image') && $request->image->isValid()) 
        {
        $extension=$request->image->extension();
        $filename=time()."_.".$extension;
        $request->image->move(public_path('images'),$filename);
        }
        else
        {
        $filename='no image.png';
        }

        
      $label =$request->barcodelabel;
      $barcode_generator =new Picqer\Barcode\BarcodeGeneratorPNG();
      //$barcode = array();
      $barcode= $barcode_generator->getBarcode($label,$barcode_generator::TYPE_CODE_128);
      //$barcode = 'hhhh';
         $product= product::create([

        'product'=>$request->product,
        'p_price'=>$request->p_price,
        'size'=>$request->size,
        'color'=>$request->color,
        'label'=>$label,
        'type'=>$request->madein,
        'brand'=>$request->brand,
        'madein'=>$request->madein,        
        'barcode'=>(base64_encode($barcode)),
        'status'=>$request->status,
        'image'=>$filename,
        ]);
     // dd($product);
    // dd(utf8_encode($barcode));

        if ($product) {
        return redirect('/product')->with('message','Items Add successfully');
        }

        }


 public function update_product(Request $request)
    {
   //  dd($request->id);
       $product=product::find($request->id);


        $product->update($request->all());
  
             

        return back();
    }


public function get_product(Request $request)
{
    // console.log('sdf');
        $product=product::find($request['id']);
        // dd($product);

         $data = [
            'id' => $product->id,
            'product' => $product->product,
            'p_price' => $product->p_price,
            'size' => $product->size,
            'color' => $product->color,
            'label' => $product->label,
            'type' => $product->type,
            'brand' => $product->brand,
            'madein' => $product->madein,
             'barcode' => $product->barcode,
            'status' => $product->status,
            'image' => $product->image,
        ];

        return $data;
}


 public function delete($id , Request $request)
        {

        $product=product::find($id);
            $id= $request->id;
        
       $product1= product::where('id', $id)
       ->update(['status' => 'InActive'
        ]);
        if ($product1) 
        {
        return redirect('/product')->with ('message', ' Product Status Inactive!');
        }
        }  


}
