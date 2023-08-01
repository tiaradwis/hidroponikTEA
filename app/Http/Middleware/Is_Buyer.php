<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Is_Buyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        

            if (auth()->user()->is_seller == '0') {
                return $next($request);
            } else {
                return redirect('/Dashboard')->with('error', "You don't have access.");
            }

        

        

        // return redirect('/login')->with('error', "You don't have access.");
    }
}
