<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrevenBackHistory
{
   public function handle($request, Closure $next){
    $response = $next($request);

    return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
      ->header('Pragma','no-cache')
      ->header('Expires','Sat, 26 Jull 1997 05:00:00 GMT');
   }
}
