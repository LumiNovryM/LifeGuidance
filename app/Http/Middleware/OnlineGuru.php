<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlineGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('guru')->check()) {
            $expireAt = now()->addMinutes(2);
            Cache::put('guru-is-online-'.Auth::guard('guru')->user()->id, true, $expireAt);

            Guru::where('id', Auth::guard('guru')->user()->id)->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}
