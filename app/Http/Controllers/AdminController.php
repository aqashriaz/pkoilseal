<?php

namespace App\Http\Controllers;

use App\admin;
use App\User;
use DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }

public function index()
    {
        return view('addAdmin');
    }

public function insertAdmin(Request $request)
        {
        $insert = new User;
        $insert= User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'rememberToken' => $request->token,
        'admin_role' => $request->admin_role,
        'status' => $request->status,
        'password' => bcrypt($request->password),
        ]);
//dd($insert);
        if ($insert) {
        return redirect('/addAdmin')->with('message','User Added successfully');
        }


        }


public function userlist()
    {
       // $user=User::all();

$user = DB::Table('users')->select('*')->where('admin_role','!=' ,'Super_Admin')->get();  
/*print_r($user);
exit();*/
        return view('user_list',compact('user'));
    }

public function get_userlist(Request $request)
        {
        $user=User::find($request['id']);
        $data = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'admin_role' => $user->admin_role,
        'phone' => $user->phone,
        'status' => $user->status,
        'password' => $user->password,
        ];

        return $data;
        }


 public function userlist_update(Request $request)
        {
        $user=user::find($request->id);
      
        $user->update(['name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => bcrypt($request->password),
        'admin_role' =>$request->admin_role,
        'status' =>$request->status,

        ]);
        return back()->with ('message', 'Admin User update successfully');;
        }



 public function delete($id)
        {

        $user=User::find($id);

        $deleted = $user->delete();
        if ($deleted) 
        {
        return redirect('/userlist')->with ('message', 'Admin User successfully deleted!');
        }
        } 



}
