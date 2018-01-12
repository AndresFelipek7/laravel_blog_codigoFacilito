<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
	protected $auth;

	public function __construct(Guard $auth){
		$this->auth = $auth;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		/*if ($this->auth->user()->typeUser()) {
			return $next($request);
		}else {
			dd("El usuario no es administrador , es solo miembro");
		}*/

		if (1 == 2) {
			dd("Es correcto ha entrado al lado verdadero y por aca va ha entrar el admin solamente");
		}else {
			abort(503);
		}
		/*return $next($request);*/
	}
}
