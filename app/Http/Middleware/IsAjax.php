<?php

namespace App\Http\Middleware;

use Closure;

class IsAjax
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$request->ajax()){
            return response()->json(['data' => '', 'code' => 403, 'message' => '非法访问']);
        }else{

            return $next($request);
        }

    }
}
