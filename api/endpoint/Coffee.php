<?php

namespace api\endpoint;

use google\appengine\ext\remote_api\Request;
use Interop\Container\ContainerInterface;
use Slim\Http\Response;
use util\Fcm;

class Coffee {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function startOffer(Request $request, Response $response, array $args) {
        Fcm::send($args['train'], 'coffee', [
            ['name' => 'Cappuccino', 'price' => 1.2],
            ['name' => 'Macchiato', 'price' => 1.2]
        ]);
    }
}