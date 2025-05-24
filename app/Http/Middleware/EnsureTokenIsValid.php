<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EnsureTokenIsValid
{
    const TEMP_ACCESS_TOKEN = 'x';
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->input('token') !== self::TEMP_ACCESS_TOKEN) {
            //return redirect('/home');
            throw new AccessDeniedHttpException(response()->json([
                'message'   => 'AccessDenied',
            ]));
        }
        
        return $next($request);
    }
}
