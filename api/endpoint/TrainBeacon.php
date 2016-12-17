<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class TrainBeacon {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getBeacons(Request $request, Response $response, array $args) {
        return $response->withJson([
            'train' => 9361,
            'wagons' => [2001, 2002, 2101, 2102, 2201, 2202, 2301, 2302, 2401, 2402, 2501, 2502, 2601, 2602, 2701, 2702]
        ]);
    }
}