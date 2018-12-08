<?php

namespace App\Controllers;

use Slim\Http\{Response, Request};

class IndexController extends Controller
{

    /**
     * @param \Slim\Http\Response $response
     * @param \Slim\Http\Request  $request
     * @param                     $name
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(Response $response, Request $request, $name = null)
    {
        return $this->view->render(
            $response,
            'index.twig',
            [
                'name' => $name ?? 'Default Name',
                'page' => 'home',
            ]
        );
    }

}