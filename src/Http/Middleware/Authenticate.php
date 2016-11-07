<?php

declare (strict_types = 1);

namespace Nodes\ServiceAuthenticator\Http\Middleware;

use Closure;
use Nodes\Database\Exceptions\EntityNotFoundException;
use Nodes\ServiceAuthenticator\Exceptions\UnAuthorizedException;
use Nodes\ServiceAuthenticator\Models\Services\ServiceRepository;

/**
 * Class Authenticate
 *
 * @package Nodes\ServiceAuthenticator\Http\Middleware
 */
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
        if (!$header = \Request::header('Authorization')) {
            throw new UnAuthorizedException('Missing Authorization header');
        }

        try {
            $service = app(ServiceRepository::class)->getClientByTokenOrFail($header);
            // Set authenticated application
            app()->singleton('nodes.service.auth', function () use ($service) {
                return $service;
            });
        } catch (EntityNotFoundException $e) {
            throw new UnAuthorizedException('Token was not found');
        }

        return $next($request);
    }
}
