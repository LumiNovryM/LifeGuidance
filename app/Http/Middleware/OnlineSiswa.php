<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlineSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('siswa')->check()) {
            $expireAt = now()->addMinutes(2);
            Cache::put('user-is-online-'.Auth::guard('siswa')->user()->name, true, $expireAt);

            Siswa::where('name', Auth::guard('siswa')->user()->name)->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}
