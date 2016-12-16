<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Swagger {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function get(Request $request, Response $response, array $args) {
        $exclude = [
            "exclude" => "vendor",
        ];

        $swagger = \Swagger\scan('.', $exclude);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write($swagger);
    }
}