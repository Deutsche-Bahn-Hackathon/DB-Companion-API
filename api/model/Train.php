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

    /**
     * @var Wagon
     * * @SWG\Property(@SWG\Xml(name="wagons",wrapped=true))
     */
    private $wagons;



    function jsonSerialize() {
    }
}