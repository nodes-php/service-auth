<?php

namespace Nodes\ServiceAuthenticator\Http\Middleware;

use Closure;
use Nodes\ServiceAuthenticator\Exceptions\UnAuthorizedException;

class Authenticate
{
    /**
     * handle
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param          $request
     * @param \Closure $next
     * @param null     $guard
     * @return mixed
     * @throws \Nodes\ServiceAuthenticator\Exceptions\UnAuthorizedException
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$header = \Request::header('X-Authorization')) {
            throw new UnAuthorizedException('Missing X-Authorization');
        }

        dd($header);

        return $next($request);
    }
}
