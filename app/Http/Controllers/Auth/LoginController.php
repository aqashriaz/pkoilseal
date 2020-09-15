<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

 use AuthenticatesUsers;

 protected function redirectTo(){
      
      if(Auth::User()->admin_role == 'Super_Admin' && Auth::User()->status == 'Active'){
           return 'home';
      }
       else if(Auth::User()->admin_role == 'Inventory_Manager' && Auth::User()->status == 'Active'){
           
           return 'invent_Home';

      }
      else if(Auth::User()->admin_role == 'Front_Desk_Manager' && Auth::User()->status == 'Active'){
           return 'frontdesk';

      }

      else
        return '/';


    }
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
