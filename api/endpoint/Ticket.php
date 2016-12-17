<?php

namespace api\endpoint;

use DateTime;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Datastore;
use util\Utils;

class Ticket {

    public function create(Request $request, Response $response, array $args) {
        $db = Datastore::ticket();
        $id = Utils::randomTicketID();

        $departure = new DateTime;
        $departure->setTimestamp(time() + 300);

        $ticket = [
            'id' => $id,
            'acquired' => new DateTime,
            'departure' => $departure,
            'origin' => 'München',
            'destination' => 'Kiel',
            'train_class' => 1,
            'train' => 'ICE-1206',
            'wagon' => 22,
            'seat' => 64,
            'platform' => '1A'
        ];

        $entity = $db->createEntity($ticket);
        $db->upsert($entity);

        $ticket['acquired'] = date(DATE_RFC3339, time());
        $ticket['departure'] = date(DATE_RFC3339, $departure->getTimestamp());

        return $response->withJson($ticket);
    }
}