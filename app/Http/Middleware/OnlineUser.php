<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        if(!empty(Auth::check())){
            // die;
            $expiretime = Carbon::now()->addMinutes(10);
            Cache::put('OnlineUser'.Auth::user()->id, true,$expiretime);

            $setUserInfo = User::getSingle(Auth::user()->id);
            $setUserInfo->updated_at = date('H:i:s y-m-d');
            $setUserInfo->save();
        }
        return $next($request);
    }
}
