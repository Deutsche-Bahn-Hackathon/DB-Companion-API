<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Datastore;

class Facility {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getNext(Request $request, Response $response, array $args) {
        switch ($args['facility']) {
            case 'restaurant':
                $json = [
                    [
                        'driving_direction' => $args['wagon'] == 26 ? null : $args['wagon'] == 27,
                        'to_go' => 26 - $args['wagon'],
                        'wagon' => 26,
                    ],
                    [
                        'driving_direction' => $args['wagon'] == 27 ? null : false,
                        'to_go' => 27 - $args['wagon'],
                        'wagon' => 27,
                    ]
                ];

                usort($json, function ($a, $b) {
                    return $a['to_go'] - $b['to_go'];
                });

                break;
            case 'toilet':
                $wagon = $args['wagon'];

                $toilet = null;

                $toilet_20 = Datastore::toilet()->fetchOne("SELECT * FROM Toilet WHERE train = '${args['train']}' AND wagon = 20");
                $toilet_23 = Datastore::toilet()->fetchOne("SELECT * FROM Toilet WHERE train = '${args['train']}' AND wagon = 23");

                $json = [
                    [
                        'driving_direction' => $wagon == 20 ? null : true,
                        'free' => true,
                        'to_go' => abs($wagon - 20),
                        'wagon' => 20
                    ],
                    [
                        'driving_direction' => $wagon >= 20 && $wagon <= 22 ? false : ($wagon == 23 ? null : true),
                        'free' => true,
                        'to_go' => abs($wagon - 23),
                        'wagon' => 23
                    ]
                ];

                usort($json, function ($a, $b) {
                   return $a['to_go'] - $b['to_go'];
                });

                break;
            default:
                $json = ['error' => 'Facility must be one of: restaurant; toilet.'];
                break;
        }

        return $response->withJson($json);
    }
}