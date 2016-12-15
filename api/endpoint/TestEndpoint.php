<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class TestEndpoint {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public function doTest(Request $request, Response $response, array $args) {
        return $response->withJson(['test' => $args['arg']]);
    }
}