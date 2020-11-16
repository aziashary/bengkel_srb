<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
            if (auth()->user()->jabatan  == 'kasir') {
            return $next($request);
    }
    return alert('error',"You don't have admin access.");
}
}