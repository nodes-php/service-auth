<?php

namespace Nodes\ServiceAuthenticator\Exceptions;

use Nodes\Exceptions\Exception;
use Nodes\ServiceAuthenticator\Models\Services\Service;

/**
 * Class ServiceIsNotClientException
 *
 * @package Nodes\ServiceAuthenticator\Exceptions
 */
class ServiceIsNotClientException extends Exception
{
    /**
     * ServiceIsNotClientException constructor
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param \Nodes\ServiceAuthenticator\Models\Services\Service $service
     */
    public function __construct(Service $service)
    {
        parent::__construct(sprintf('Service [%s] is not a type client', $service->slug), 500);
    }
}