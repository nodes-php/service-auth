<?php

namespace Nodes\ServiceAuthenticator\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Nodes\Database\Exceptions\EntityNotFoundException;
use Nodes\Exceptions\Exception;
use Nodes\ServiceAuthenticator\Models\Services\Service;
use Nodes\ServiceAuthenticator\Models\Services\ServiceRepository;

/**
 * Class ServicesController
 *
 * @package Nodes\ServiceAuthenticator\Http\Controllers
 */
class ServicesController extends Controller
{
    /**
     * refresh
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param \Nodes\ServiceAuthenticator\Models\Services\ServiceRepository $serviceRepository
     * @return \Illuminate\Http\JsonResponse
     * @throws \Nodes\Exceptions\Exception
     */
    public function refresh(ServiceRepository $serviceRepository) : JsonResponse
    {
        $token = \Request::get('token');
        $slug = \Request::get('slug');
        $baseUrl = \Request::get('base_url');

        if (!$slug || !$slug || !$baseUrl) {
            throw (new Exception('Missing token, slug or base_url', 412))->setStatusCode(412);
        }

        try {
            /** @var Service $service */
            $service = $serviceRepository->getByOrFail('slug', $slug);
            $service->update([
                'token'    => $token,
                'base_url' => $baseUrl,
            ]);
        } catch (EntityNotFoundException $e) {
            $serviceRepository->create([
                'slug'     => $slug,
                'token'    => $token,
                'base_url' => $baseUrl,
                'type'     => Service::TYPE_SERVER,
            ]);
        }

        return response()->json([
            'message' => 'Token stored',
        ]);
    }
}