<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    public function handle($request, Closure $next)
    {
        if(!auth()->check()){
            return response()->json([
                'status' => 404,
                'message' => 'Chua login'
            ]);
        }
        $payload = auth()->payload();
        if(time() > $payload('exp')){
            return response()->json([
                'status' => 404,
                'message' => 'Het phien dang nhap'
            ]);
        }
        return $next($request);
    }
}
