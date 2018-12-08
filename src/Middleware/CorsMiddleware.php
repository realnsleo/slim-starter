<?php

namespace App\Middleware;

use Slim\Http\{Request, Response};

class CorsMiddleware extends Middleware
{

    /**
     * Allows access to this API from anywhere
     *
     * @param \Slim\Http\Request  $request
     * @param \Slim\Http\Response $response
     * @param                     $next
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $next): Response
    {
        $response = $next($request, $response);

        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader(
                'Access-Control-Allow-Headers',
                'X-Requested-With, Content-Type, Accept, Origin, Authorization'
            )
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }
}