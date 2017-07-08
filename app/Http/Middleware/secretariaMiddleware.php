<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class secretariaMiddleware
{
  protected $auth;
  public function __construct(Guard $auth){
    $this->auth=$auth;
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
      if($this->auth->user()->nivel_1==false){

        Session::flash('message-error','sin privilegios');
        return redirect()->to('homeAdministrador');
      }
     return $next($request);

    }
}
