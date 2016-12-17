<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Datastore;

class Toilet {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function get(Request $request, Response $response, array $args) {
        $toilet = Datastore::toilet()->fetchOne("SELECT * FROM Toilet WHERE train = '${args['train']}' AND id = '${args['id']}'");

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson([
                'free' => $toilet == null ? null : $toilet->status
            ]);
    }

    public static function put(Request $request, Response $response, array $args) {
        $db = Datastore::toilet();
        $toilet = $db->fetchOne("SELECT * FROM Toilet WHERE train = '${args['train']}' AND id = '${args['id']}'");

        if ($toilet == null) {
            $toilet = $db->createEntity([
                'id' => (int) $args['id'],
                'train' => $args['train'],
                'status' => $args['status'] == 1
            ]);
        } else {
            $toilet->status = $args['status'] == 1;
        }

        $db->upsert($toilet);

        return $response->withStatus(204);
    }
}