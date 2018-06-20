<?php

namespace App\Http\Middleware;

use Closure;

class estrategicoMiddleware
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
         //if($this->auth->user()->id==2){

          //Session::flash('message-error','sin privilegios');
          return redirect()->to('homeEstrategico');
        //}
        return $next($request);
    }
}
