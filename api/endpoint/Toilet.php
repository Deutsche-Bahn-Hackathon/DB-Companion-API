<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Toilet {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function get(Request $request, Response $response, array $args) {
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson([
                'free' => true
            ]);
    }

    public static function put(Request $request, Response $response, array $args) {
        return $response->withStatus(204);
    }
}