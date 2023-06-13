<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlineUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::check()){
            $expireAt = now()->addMinutes(2);
            Cache::put('user-is-online'.Auth::id(),true,$expireAt);

            User::where('id', Auth::id())->update(['last_seen' => now()]);

        }

        return $next($request);
    }
}
