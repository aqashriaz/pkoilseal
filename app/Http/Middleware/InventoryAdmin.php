<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class InventoryAdmin
{
   
    public function handle($request, Closure $next)
    {
        if(Auth::User()->admin_role == 'Inventory_Manager')
        {
            return $next($request);
        }
        else
        {
           return redirect()->back();
        }

    }
}
