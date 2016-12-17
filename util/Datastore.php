<?php

namespace util;

use GDS\Gateway\ProtoBuf;
use GDS\Schema;
use GDS\Store;

class Datastore {

    public static function toilet() {
        return new Store(
            (new Schema('Toilet'))
                ->addInteger('id')
                ->addString('train')
                ->addBoolean('status'),
            new ProtoBuf(null, 'Toilets')
        );
    }
}