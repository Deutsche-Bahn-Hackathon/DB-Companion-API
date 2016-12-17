<?php

namespace api\endpoint;

use DateTime;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Datastore;
use util\Utils;

class Ticket {

    private $id;
    private $acquired;
    private $origin;
    private $destination;
    private $travel_class;
    private $train;
    private $wagon;
    private $seat;

    public function __construct($id) {
        $this->id = $id;
        $this->acquired = new DateTime;
        $this->origin = 'München';
        $this->destination = 'Kiel';
        $this->travel_class = 1;
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
            'class' => $this->travel_class,
            'train' => $this->train,
            'wagon' => $this->wagon,
            'seat' => $this->seat,
            'platform' => $this->platform
        ]);

        $db->upsert($ticket);
    }

    public static function create(Request $request, Response $response, array $args) {
        return $response->withJson(new Ticket(strtoupper(explode('-', Utils::randomUUID())[0])));
    }
}