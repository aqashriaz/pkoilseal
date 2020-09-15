<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\product;
use App\warehouse;
use App\cabin;
use App\inventory;
use DB;
use App\Threshold;
use App\User;
use App\Sale;


class InventoryhomeController extends Controller
{
 

 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
                $threshold= Threshold::all();
    $product=product:: all();
    $warehouse=warehouse:: all();
    $cabin=cabin:: all();
    $inventory=inventory:: all();
    $data= DB::table('inventories')
          ->join('products','products.id','=','inventories.product_id')
          ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
        /*  ->join('cabins','cabins.id','=','cabins.cabin_name')
        */  ->select('products.id','products.product','products.barcode','products.size','products.color','inventories.quantity','warehouses.warehouse_name','products.image','products.label')
          ->get();
  
     $data1= DB::table('inventories')
        ->join('products','products.id','=','inventories.product_id')
        ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
        ->select('inventories.*', 'products.product', 'warehouses.warehouse_name')
          ->get();
          

$array = json_decode(json_encode($threshold), true);

 
       if(!empty($array)){

$alert=$array[0]['alert'];

//$array = json_decode(json_encode($threshold), true);
$warning=$array[0]['warning'];
        
}
else{
$alert = 0;
$warning = 0;
    
}


   return view ('inventoryhome',compact('data','product','warehouse','cabin','inventory','data1','threshold','alert','warning','array'));
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
     * @param  \App\inventoryhome  $inventoryhome
     * @return \Illuminate\Http\Response
     */
    public function show(inventoryhome $inventoryhome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inventoryhome  $inventoryhome
     * @return \Illuminate\Http\Response
     */
    public function edit(inventoryhome $inventoryhome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inventoryhome  $inventoryhome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventoryhome $inventoryhome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inventoryhome  $inventoryhome
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventoryhome $inventoryhome)
    {
        //
    }

     public function invent_profile(){

    $id = Auth()->User()->id; 
    $user=User::find($id);
  return view('invent_setting',compact('user'));
   }       

   public function update_profile(Request $request){
       
       $id= $request->id;
    User::where('id', $id)
       ->update(['name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => bcrypt($request->password)
        ]);// $user->update($request->all());
        return back()->with ('message', ' User  successfully Updated!'); 
       

 
   }       


}
