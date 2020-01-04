<?php

namespace App\Http\Middleware;

use Closure;

class Filter
{
    /**测试接口防刷使用此中间件
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
