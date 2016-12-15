<?php

namespace api\endpoint;

use Slim\Http\Request;
use Slim\Http\Response;

class Swagger {

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