<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use App\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Picqer;
use color;

class invent_add_product extends Controller
{
    public function invent_product()
    {
        $product=product:: all();
        print_r($product);
        exit();
        $color=color::all();
        print_r($color);
        exit();
        $color1=color::all();
        return view('inventory_add_product',compact('product','color1','color'));
    }


 public function invent_save(Request $request)
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
      $barcode= $barcode_generator->getBarcode($label,$barcode_generator::TYPE_CODE_128);
     $product= product::create([

        'product'=>$request->product,
        'size'=>$request->size,
        'color'=>$request->color,
        'label'=>$label,
        'barcode'=>base64_encode($barcode),
        'status'=>$request->status,
        'image'=>$filename,
        ]);

        if ($product) {
        return back()->with('message','Items Add successfully');
        }

        }


public function invent_get_product(Request $request)
        {
        $product=product::find($request['id']);
        $data = [
        'id' => $product->id,
        'product' => $product->product,
        'price' => $product->price,
        'size' => $product->size,
        'color' => $product->color,
        'label' => $product->label,
        'barcode' => $product->barcode,
        'status' => $product->status,
        'image' => $product->image,
        ];
        return $data;
        }


 public function invent_product_update(Request $request)
        {
        $product=product::find($request->id);
        $product->update($request->all());
        return back();
        }


 public function delete($id)
         {

        $product=product::find($id);
       
       $product1= product::where('id', $id)
       ->update(['status' => 'Inactive'
        ]);
        {
        return redirect('/invent_product')->with ('message', 'Product Status Inactive!');
        }
        }   

}

 