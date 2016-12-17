<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Fcm;

class Departure {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function update(Request $request, Response $response, array $args) {
        Fcm::send('ice1206', 'departure', [
            'departure' => date(DATE_RFC3339, time() + 60),
            'platform' => '13'
        ]);
    }
}