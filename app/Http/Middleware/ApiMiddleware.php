<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class ApiMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (env("APP_DEBUG"))    // debug -> test user
			$user = User::find(1);
		elseif ($request->arduino)    // arduino token
			$user = User::where("arduino_token", $request->arduino)->first();
		elseif ($request->app)        // app token
			$user = User::where("app_token", $request->app)->first();
		else                        // no token
			return abort(403);


		if (!$user)    // token doesn't match
			abort(403);


		session(["user" => $user]);

		// CORS headers
		return $next($request)->withHeaders([
			'Access-Control-Allow-Origin'      => "*",
			'Access-Control-Allow-Methods'     => 'OPTIONS, GET, POST, PUT, PATCH, DELETE',
			'Access-Control-Allow-Headers'     => 'Origin, Content-Type',
			'Access-Control-Allow-Credentials' => '',
		]);
	}
}
