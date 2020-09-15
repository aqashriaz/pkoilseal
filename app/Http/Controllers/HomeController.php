<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\warehouse;
use App\product;
use App\User;
use App\Sale;
use App\inventory;
use App\Threshold;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
      //  $this->middleware('AdminMiddleware');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
      //dd("sjaghfakj");
        $threshold= Threshold::all();
        $warehouse= warehouse::all();
        $product= product::all();
        $User= User::all();
        $inventory=inventory::all();
        
           $data= DB::table('inventories')
        ->join('products','products.id','=','inventories.product_id')
        ->join('warehouses','warehouses.id','=','inventories.warehouse_id')
        ->select('inventories.*', 'products.product', 'warehouses.warehouse_name')
          ->get();
          
      /* $alert= $threshold->alert;*/
      
     
$array = json_decode(json_encode($threshold), true);

 
       if(!empty($array)){

$alert=$array[0]['alert'];

//$array = json_decode(json_encode($threshold), true);
$warning=$array[0]['warning'];
        
}else{
$alert = 0;
$warning = 0;
    
}

        $sale = DB::table('sales')->select(DB::raw('*'))->whereRaw('Date(created_at) = CURDATE()')->get();
        $admin='Inventory_Manager';
        $inventoryCount = User::where('admin_role',$admin)->count();
        $admin1='Front_Desk_Manager';
        $frontCount = User::where('admin_role',$admin1)->count();
        $productCount = product::count();


        $saleCount = DB::table('sales')->select(DB::raw('price'))
        ->whereRaw('Date(created_at) = CURDATE()')->count();
        $salesum = DB::table('sales')->whereRaw('Date(created_at) = CURDATE()')->sum('price');

 $date = \Carbon\Carbon::today()->subDays(7);
    $salesum7 = Sale::where('created_at','>=',$date)->sum('price');
    

 $date = \Carbon\Carbon::today()->subDays(30);
    $salesum30 = Sale::where('created_at','>=',$date)->sum('price');
    
         $warehouseCount = warehouse::count();
        return view('home',compact('warehouse','product','User','inventoryCount','frontCount','productCount','warehouseCount','sale','saleCount','salesum','inventory','salesum7','salesum30','data','threshold','alert','warning'));
    }





public function admin_index_profile(){

    $id = Auth()->User()->id; 
    $user=User::find($id);
  return view('superprofile',compact('user'));
   }       


public function shortagealert(){
        $threshold= Threshold::all();

     $warehouse1= warehouse::all();
        $product1= product::all();
 $inventory1=inventory::all();
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
        
}else{
$alert = 0;
$warning = 0;
    
}
  return view('shortagealert',compact('user','warehouse1','product1','inventory1','alert','warning','data1','threshold'));
   }       

   public function admin_profile(Request $request){
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
