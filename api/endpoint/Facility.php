<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Facility {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getNext(Request $request, Response $response, array $args) {
        switch ($args['facility']) {
            case 'restaurant':
                $json = [
                    'driving_direction' => $args['wagon'] == 26 ? null : $args['wagon'] == 27,
                    'to_go' => 26 - $args['wagon'],
                    'wagon' => 26,
                ];
                break;
            case 'toilet':
                $wagon = $args['wagon'];

                if ($wagon >= 23) {
                    $json = [
                        'driving_direction' => $wagon == 23 ? null : true,
                        'to_go' => $wagon - 23,
                        'wagon' => 23
                    ];
                } else if ($wagon == 22) {
                    $json = [
                        'driving_direction' => false,
                        'to_go' => 1,
                        'wagon' => 23
                    ];
                } else {
                    $json = [
                        'driving_direction' => $wagon == 20 ? null : true,
                        'to_go' => $wagon == 20 ? 0 : 1,
                        'wagon' => 20
                    ];
                }

                break;
            default:
                $json = ['error' => 'Facility must be one of: restaurant; toilet.'];
                break;
        }

        return $response->withJson($json);
    }
}