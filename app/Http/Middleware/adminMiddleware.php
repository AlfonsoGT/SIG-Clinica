<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class adminMiddleware
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

        if($this->auth->user()->nivel_3==false){

          Session::flash('message-error','sin privilegios');
          return redirect()->to('homeSecretaria');
        }
       return $next($request);

    }
}
