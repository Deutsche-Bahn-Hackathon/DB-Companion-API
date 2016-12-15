<?php

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Train")
 * )
 */
class Train implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $id;

    function jsonSerialize() {
    }
}