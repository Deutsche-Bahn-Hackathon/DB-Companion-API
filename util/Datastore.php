<?php

namespace util;

use GDS\Gateway\ProtoBuf;
use GDS\Schema;
use GDS\Store;

class Datastore {
    public static function toilet() {
        return new Store(
            (new Schema('Toilet'))
                ->addBoolean('free')
                ->addString('train')
                ->addInteger('wagon'),
            new ProtoBuf(null, 'Toilets')
        );
    }

    public static function ticket() {
        return new Store(
            (new Schema('Ticket'))
                ->addString('id')
                ->addDatetime('acquired')
                ->addString('origin')
                ->addString('destination')
                ->addInteger('class')
                ->addString('train')
                ->addInteger('wagon')
                ->addInteger('seat')
                ->addString('platform'),
            new ProtoBuf(null, 'Tickets')
        );
    }
}