<?php

namespace Nodes\ServiceAuthenticator\Exceptions;

use Nodes\Exceptions\Exception;

/**
 * Class UnAuthorizedException
 *
 * @package Nodes\ServiceAuthenticator\Exceptions
 */
class UnAuthorizedException extends Exception
{
    /**
     * UnAuthorizedException constructor
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 403);
        $this->dontReport();
        $this->setStatusCode(403);
    }
}