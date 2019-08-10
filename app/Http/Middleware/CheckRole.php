<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $cargo
     * @return mixed
     */
    public function handle($request, Closure $next, $cargo)
    {
        if ($request->user()->cargo->nome !== $cargo) {
            return redirect('unauthorized');
        }

        return $next($request);
    }

}