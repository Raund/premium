<?php namespace App\Http\Middleware;

use Closure;
use App;


use League\Flysystem\Config;

class BackendInit {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next)
	{
		view()->share('version', config('app.version'));


		return $next($request);
	}

}
