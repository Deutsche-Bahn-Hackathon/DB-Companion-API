<?php

namespace api\endpoint;

class Endpoint {

    public static function add($class, $function) {
        return sprintf('%s%s:%s', '\api\endpoint\\', $class, $function);
    }
}