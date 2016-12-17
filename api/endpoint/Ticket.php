<?php

namespace api\endpoint;

use Slim\Http\Request;
use Slim\Http\Response;
use util\Datastore;
use util\Utils;

class Ticket {

    private $id;
    private $acquired;
    private $origin;
    private $destination;
    private $class;
    private $train;
    private $wagon;
    private $seat;

    public function __construct($id) {
        $this->id = $id;
        $this->acquired = new DateTime();
        $this->origin = 'München';
        $this->destination = 'Kiel';
        $this->class = 1;
        $this->train = 'ICE-1206';
        $this->wagon = 22;
        $this->seat = 64;
        $this->platform = '1A';

        $db = Datastore::ticket();
        $ticket = $db->createEntity([
            'id' => $id,
            'acquired' => $this->acquired,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'class' => $this->class,
            'train' => $this->train,
            'wagon' => $this->wagon,
            'seat' => $this->seat,
            'platform' => $this->platform
        ]);

        $db->upsert($ticket);
    }

    public static function create(Request $request, Response $response, array $args) {
        $id = Utils::randomUUID();
        $ticket = new Ticket($id);

        return $response->withJson($ticket);
    }
}