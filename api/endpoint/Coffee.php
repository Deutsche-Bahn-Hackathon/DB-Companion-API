<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Fcm;
use util\Utils;

class Coffee {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function startOffer(Request $request, Response $response, array $args) {
        Fcm::send($args['train'], 'coffee', [
            ['id' => Utils::randomUUID(), 'name' => 'Cappuccino', 'price' => 1.2],
            ['id' => Utils::randomUUID(), 'name' => 'Macchiato', 'price' => 1.2]
        ]);
    }
}