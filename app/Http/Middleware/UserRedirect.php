<?php

namespace App\Http\Middleware;

use Closure;

class UserRedirect {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'user') {
		if (auth()->guard($guard)->check()) {
			return redirect('user/home');			
		}

		return $next($request);
	}
}
