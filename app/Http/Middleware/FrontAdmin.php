<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class FrontAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::User()->admin_role == 'Front_Desk_Manager')
            {
            return $next($request);
            }
            else
            {
return redirect()->back();
            }
            
    }
}
