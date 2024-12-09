<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // if(in_array($request->user()->level,$levels)){
        //     return $next($request);
        // }
        if ($request->user()->level) {
            return $next($request);
        }
        // return redirect('/');
        // if ($request->user()->level == 'admin') {
        //     return $next($request);
        // }
        // else if ($request->user()->level == 'dosen') {
        //     return $next($request);
        // }
        // else if ($request->user()->level == 'mahasiswa') {
        //     return $next($request);
        // }
        return redirect('/');

    }
}
