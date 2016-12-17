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
}