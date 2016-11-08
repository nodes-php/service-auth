<?php

namespace Nodes\ServiceAuthenticator\Exceptions;

use Nodes\Exceptions\Exception;

/**
 * Class PreConditionFailedException.
 */
class PreConditionFailedException extends Exception
{
    /**
     * ServiceIsNotClientException constructor.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 412);
        $this->dontReport();
        $this->setStatusCode(412);
    }
}
