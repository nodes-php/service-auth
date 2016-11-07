<?php

declare(strict_types = 1);

namespace Nodes\ServiceAuthenticator\Models\Services;

use GuzzleHttp\Client;
use Nodes\Database\Eloquent\Repository as NodesRepository;

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

    public function handshake(Service $service)
    {
        $service->resetThisToken();

        $slash = ends_with($service->base_url, '/') ? '' : '/';

        $url = $service->base_url . $slash . 'service-authenticaor/handshake';

        $reponse = (new Client())->post($url, [
            'form_params' => [
                'this_token' => $service->this_token,
                'that_token' => $service->that_token,
                'slug'  => $service->slug,
            ],
        ]);
        $body = json_decode($reponse->getBody()->getContents(), true);

        $service->update([
            'that_token' => $body['token'],
        ]);

        dd($service);
    }
}
