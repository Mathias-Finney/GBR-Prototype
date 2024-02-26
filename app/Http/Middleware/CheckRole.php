<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // CHeck if the user has the 'admin' role
        if($request->user() && $request->user()->hasRole('admin')){

            return $next($request);
        }else{

            // If not redirect or respond with an error message
            return redirect('/')->with('error', 'Unauthorized Access');
        }
    }
}
