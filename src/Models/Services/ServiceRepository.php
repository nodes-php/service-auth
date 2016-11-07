<?php

declare(strict_types = 1);

namespace Nodes\ServiceAuthenticator\Models\Services;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Nodes\Database\Eloquent\Repository as NodesRepository;
use Nodes\Database\Exceptions\EntityNotFoundException;

/**
 * Class ServiceRepository
 *
 * @package Nodes\ServiceAuthenticator\Models\Services
 */
class ServiceRepository extends NodesRepository
{
    /**
     * ServiceRepository constructor
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param \Nodes\ServiceAuthenticator\Models\Services\Service $model
     */
    public function __construct(Service $model)
    {
        $this->setupRepository($model);
    }

    /**
     * getClients
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getClients() : Collection
    {
        return $this->where('type', Service::TYPE_CLIENT)->get();
    }

    /**
     * refresh
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param \Nodes\ServiceAuthenticator\Models\Services\Service $service
     * @return void
     */
    public function refresh(Service $service)
    {
        $service->guardClient();

        $slash = ends_with($service->base_url, '/') ? '' : '/';

        $url = $service->base_url . $slash . 'service-authenticator/services/refresh';

        (new Client())->post($url, [
            'form_params' => [
                'token'    => $service->token,
                'base_url' => config('nodes.service-authenticator.base_url'),
                'slug'     => config('nodes.service-authenticator.slug'),
            ],
        ]);
    }

    /**
     * getClientByTokenOrFail
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param string $token
     * @return \Nodes\ServiceAuthenticator\Models\Services\Service
     */
    public function getClientByTokenOrFail(string $token) : Service
    {
        return cache_remember('nodes.authentication.clientByToken', ['token' => $token], null,
            function () use ($token) {
                $service = $this->where('type', Service::TYPE_CLIENT)->where('token', $token)->first();

                if (!$service) {
                    throw new EntityNotFoundException(sprintf('Service with type [client] with token [%s] was not found',
                        $token));
                }

                return $service;
            });
    }
}
