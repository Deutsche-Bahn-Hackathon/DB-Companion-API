<?php

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Station")
 * )
 */
class Station implements JsonSerializable {

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $id;

    /**
     * @SWG\Property
     * @var Coordinates
     */
    private $coordinate;

    function jsonSerialize() {
    }
}