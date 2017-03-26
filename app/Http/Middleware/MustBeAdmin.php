<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
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
        $user = $request->user();
        $error = "You do not have permission to view this page";

        if($user && $user->is_admin){
            return $next($request);
        }

        else {
            // return view('error');
            abort(404, 'You do not have permission to view this page');
        }
    }
}
