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
                    'driving_direction' => $args['wagon'] == 26 ? null : $args['wagon'] == 27,
                    'to_go' => 26 - $args['wagon'],
                    'wagon' => 26,
                ];
                break;
            case 'toilet':
                $wagon = $args['wagon'];

                $toilet = null;

                $toilet_20 = Datastore::toilet()->fetchOne("SELECT * FROM Toilet WHERE train = '${args['train']}' AND wagon = 20");
                $toilet_23 = Datastore::toilet()->fetchOne("SELECT * FROM Toilet WHERE train = '${args['train']}' AND wagon = 23");

                if ($toilet_20->free && $toilet_23->free) {
                    $toilet = $args['wagon'] <= 21 ? 20 : 23;
                } else if ($toilet_20->free) {
                    $toilet = 20;
                } else if ($toilet_23->free) {
                    $toilet = 23;
                }

                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withJson($json = [
                        'driving_direction' => $wagon == 22 ? false : $wagon == 20 || $wagon == 23 ? null : true,
                        'to_go' => $toilet == null ? null : abs($wagon - $toilet),
                        'wagon' => $toilet
                    ]);
                break;
            default:
                $json = ['error' => 'Facility must be one of: restaurant; toilet.'];
                break;
        }

        return $response->withJson($json);
    }
}