<?php

namespace App\Controllers;

use Medoo\Medoo;
use Monolog\Logger;
use Slim\Router;
use Slim\Views\Twig;

class Controller
{

    /**
     * @var \Monolog\Logger
     */
    protected $logger;

    /**
     * @var \Slim\Router
     */
    protected $router;

    /**
     * @var \Medoo\Medoo
     */
    protected $db;

    /**
     * @var \Slim\Views\Twig
     */
    protected $view;

    /**
     * Controller constructor.
     *
     * @param \Slim\Views\Twig $view
     * @param \Slim\Router     $router
     * @param \Monolog\Logger  $logger
     * @param \Medoo\Medoo     $db
     */
    public function __construct(Twig $view, Router $router, Logger $logger, Medoo $db)
    {
        $this->logger = $logger;
        $this->router = $router;
        $this->db     = $db;
        $this->view   = $view;
    }

}