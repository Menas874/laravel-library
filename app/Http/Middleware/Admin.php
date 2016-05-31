<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

class Admin
{
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

      if ($this->auth->user()->admin()) {
        return $next($request);
      }
      else {
        $message = 'Solo un administrador puede acceder a la creación de usuarios, categorias y tags.';
        $class = 'danger';

        Session::flash('message', $message);
        Session::flash('class', $class);

        return redirect()->route('admin.index');
      }

    }

}
