<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlineWalas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('walas')->check()) {
            $expireAt = now()->addMinutes(2);
            Cache::put('user-is-online-'.Auth::guard('walas')->user()->name, true, $expireAt);

            Walas::where('name', Auth::guard('walas')->user()->name)->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}
