<?php

namespace App\Http\Middleware;

use Closure;

class IsSparepart
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
        if (!isset(auth()->user()->jabatan)) {
            return abort(404);
        }

        if (auth()->user()->jabatan != 2) {
            return abort(404);
        }

        return $next($request);
    }
}
