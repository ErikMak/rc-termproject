<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards) {
        if ($this->authenticate($request, $guards) === 'authentication_failed') {
            return response()->json(['status'=> false, 'error'=>'Unauthorized'], 401);
        }

        return $next($request);
    }

    protected function authenticate($request, array $guards)
    {
        if(empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        return 'authentication_failed';
    }
}
