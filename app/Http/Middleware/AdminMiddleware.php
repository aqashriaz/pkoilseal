<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle($request, Closure $next)
    {

        if(Auth::User()->admin_role == 'Super_Admin' )
        {
            return $next($request);
        }
       else
       {
        return redirect()->back();
        }

        
    }
}
