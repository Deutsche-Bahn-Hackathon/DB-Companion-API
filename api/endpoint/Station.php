<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Station {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getAll(Request $request, Response $response, array $args) {
        $stations = file_get_contents(BASE_URL . '/static/stations.json');

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write($stations);
    }
}