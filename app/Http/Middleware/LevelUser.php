<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LevelUser
{
    public function handle(Request $request, Closure $next, ...$level)
    {
        if (in_array($request->user()->level_user, $level)) {
            return $next($request);
        }
        return abort(404);
    }
}