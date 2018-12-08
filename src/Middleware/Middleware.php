<?php

namespace App\Middleware;

use Monolog\Logger;

class Middleware
{

    protected $logger;

    /**
     * Middleware constructor.
     *
     * @param \Monolog\Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

}