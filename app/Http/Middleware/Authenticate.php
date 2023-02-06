<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return response()->json([
                'status'=>400,
                'message'=>'Chua login'
            ]);
        }
    }
//    public function handle($request, Closure $next, ...$guards)
//    {
//        if (! $request->expectsJson()) {
//            return response()->json([
//
//            ])
//        }
//    }
}
