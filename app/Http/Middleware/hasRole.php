<?php

namespace App\Http\Middleware;

use Closure;

class hasRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request  Handles the request
     * @param \Closure                 $next     Handles anonymous functions
     * @param string[]                 ...$roles Allowed roles
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user()->hasRole($roles)) {
            \Session::flash(
                'flash_message',
                'You don\'t have the permission to operate this record!' .
                ' Only Aadmin can operate records.'
            );

            return Redirect::back();
        }
        return $next($request);
    }
}
