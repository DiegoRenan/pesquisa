<?php namespace App\Http\Middleware;

use Artesaos\Defender\Facades\Defender;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
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
		if ($this->auth->check())
		{
            if(Defender::hasRole('admin'))
                return new RedirectResponse(url('/admin/'));

            if(Defender::hasRole('editor'))
                return new RedirectResponse(url('/admin/'));

            if(Defender::hasRole('coordenador'))
                return new RedirectResponse(url('/admin/'));

            if(Defender::hasRole('pesquisador'))
                return new RedirectResponse(url('/researcher/'));

            return new RedirectResponse(url('/home'));
		}

		return $next($request);
	}

}
