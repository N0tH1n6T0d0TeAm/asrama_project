<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;
use Cache;
use Illuminate\Http\Request;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(2);
            Cache::put('user-is-online-' . Auth::user()->id,true,$expiresAt);
        }
        return $next($request);
    }
}
