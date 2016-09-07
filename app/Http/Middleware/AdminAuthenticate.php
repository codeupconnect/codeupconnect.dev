<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticate
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
        if ($this->auth->guest()) 
        {
            if ($request->ajax()) 
            {
                return response('Unauthorized.', 401);
            } else 
            {
                return redirect()->guest('auth/login');
            }
        } else
        {
            if (!$this->is_admin)
            {
                return redirect()->action('HomeController@showWelcome');
            }
        }
        return $next($request);
    }
}
