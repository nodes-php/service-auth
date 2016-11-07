<?php

use Nodes\ServiceAuthenticator\Models\Services\Service;

if (!function_exists('auth_service')) {
    /**
     * auth_service
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @return \Nodes\ServiceAuthenticator\Models\Services\Service
     */
    function auth_service() : Service
    {
        return app('nodes.service.auth');
    }
}